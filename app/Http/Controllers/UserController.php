<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\MagicLinkMail;
use App\Mail\Update1Mail;
use App\Mail\BookingConfirmationMail;

class UserController extends Controller
{
	public static function index()
	{
		return User::all();
	}

	function getOne($id)
	{
		return User::find($id);
	}

	function register(Request $request)
	{
		$request->validate
		([
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'email' => 'required|email',
			'can_host' => 'nullable|integer',
			'hosting_details' => 'nullable|string',
			'coming_from' => 'required|string',
		]);
		
		if (!$invite = InviteController::find($request->invite_token))
		{
			die('Invalid invite');
		}

		if ($invite->used)
		{
			die('Invite already used');
		}
		
		$user = new User();
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->can_host = $request->can_host;
		$user->hosting_details = $request->hosting_details;
		$user->booked_on = true;
		$user->coming_from = $request->coming_from;

		$user->save();

		InviteController::markAsUsed($invite);

		\Auth::login($user);

		\Mail::to($request->email)->send(new BookingConfirmationMail($request));

		$canHost = ($request->can_host) ? $request->can_host : 0;

		DiscordBotController::sendMessage("New user $request->first_name $request->last_name ($request->email) registered.\nTravelling from: $request->coming_from. Can host: $canHost.");

		return redirect('/');
	}

	function sendMagicLink(Request $request)
	{	
		$request->validate
		([
			'email' => 'required|email'
		]);

		if ($user = User::where('email', $request->email)->first())
		{
			if (!$user->booked_on)
			{
				return view('error')->with('message', "There is no booking with this email address.");
			}
			
			$token = TokenController::generate($user); 
			
			\Mail::to($user->email)->send(new MagicLinkMail($user->first_name, urlencode($token->token) . "/?redir=" . urlencode(session()->get('url.intended'))));
		}
		else
		{
			return view('error')->with('message', "There is no account registered with this email address.");
		}

		return view('auth.linkSentConfirmation');
	}

	function logIn($tokenString, Request $request)
	{
		if ($token = TokenController::find($tokenString))
		{
			if (!$token->user->booked_on)
			{
				return view('error')->with('message', "This booking does not exist.");
			}
			else if (!$token->used)
			{
				TokenController::markAsUsed($token);
				\Auth::login($token->user);

				return redirect($request->input("redir"));
			}
			else
			{
				return view('error')->with('message', "This is not a valid token.");	
			}

		}
		else
		{
			return view('error')->with('message', "This is not a valid token.");
		}
	}

	public static function update($id, Request $request)
	{
		$user = User::find($id);
		$user->update($request->all());	

		return redirect('/');
	}

	public static function cancelSelf()
	{
		$user = \Auth::user();
		$user->booked_on = 0;
		$user->save();

		DiscordBotController::sendMessage(" $request->first_name $request->last_name ($request->email) cancelled booking.");

		\Auth::logout();
	
		return redirect('/');
	}

	public static function sendUpdateEmail()
	{
		$users = User::all();

		foreach($users as $user)
		{
			if ($user->booked_on)
			{
				$token = TokenController::generate($user); 
			
				\Mail::to($user->email)->send(new Update1Mail($user->first_name, urlencode($token->token) . "/?redir=" . \URL('') ));
			}
		}
	}
}
