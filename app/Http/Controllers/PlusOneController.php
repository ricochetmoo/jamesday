<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PlusOne;

class PlusOneController extends Controller
{
	public static function index()
	{
		return PlusOne::all();
	}

	public static function find($id)
	{
		return PlusOne::find($id);
	}

	public static function tokenExists($token)
	{
		if (PlusOne::where('accept_token', $token)->first())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function request(Request $request)
	{
		$request->validate
		([
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'email' => 'required|email',
		]);

		$user = \Auth::user();

		$plusOne = new PlusOne();

		$plusOne->first_name = $request->first_name;
		$plusOne->last_name = $request->last_name;
		$plusOne->email = $request->email;
		$plusOne->requester_id = $user->id;

		$plusOne->save();

		DiscordBotController::sendMessage("New plus one request from $user->first_name $user->last_name.\nName: $request->first_name $request->last_name\nAccept: " . url('/admin/plusone/' . $plusOne->id . '/accept') . "\nReject: " . url('/admin/plusone/' . $plusOne->id . '/reject'));

		return redirect('/');
	}

	public static function accept($id)
	{	
		$plusOne = PlusOneController::find($id);
		
		if ($plusOne->status != "requested")
		{
			return view('error')->with('message', "This plus one request has already been responded to.");
		}
		
		InviteController::generateFromAttributes($plusOne->first_name, $plusOne->last_name, $plusOne->email);

		$plusOne->status = "accepted";
		$plusOne->save();

		return redirect('/admin/plusones');
	}

	public static function reject($id)
	{
		$plusOne = PlusOneController::find($id);
		
		if ($plusOne->status != "requested")
		{
			return view('error')->with('message', "This plus one request has already been responded to.");
		}

		$plusOne->status = "rejected";
		$plusOne->save();

		return redirect('/admin/plusones');
	}
}
