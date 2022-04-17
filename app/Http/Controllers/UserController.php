<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\MaigcLinkMail;

class UserController extends Controller
{
	function index()
	{
		return User::all();
	}

	function getOne($id)
	{
		return User::find($id);
	}

	function register(Request $request)
	{
		if (!$invite = InviteController::find($request->invite_token))
		{
			die('Invalid invite');
		}
		
		$user = new User();
		$user->first_name = $request->first_name;
		$user->last_name = $reqeust->last_name;
		$user->email = $reqeust->email;
		$user->can_host = $reqeust->can_host;
		$user->booked_on = true;
		$user->coming_from = $request->coming_from;

		$user->save();

		InviteController::delete($invite);

		Auth::login($user);

		return redirect('dashboard');
	}

	function sendMagicLink($email)
	{
		if ($user = User::where('email', $email)->first())
		{
			TokenController::generate();
			
			Mail::to($email)->send(new MagicLinkMail($first_name, $token));
		}
		else
		{
			die('No user found');
		}
	}

	function logIn($user, $tokenString)
	{
		if ($token = TokenController::find($tokenString))
		{
			if ($token->user == $user)
			{
				TokenController::markAsUsed($token);
				Auth::login($user);

				return redirect('dashboard');
			}
		}
	}
}
