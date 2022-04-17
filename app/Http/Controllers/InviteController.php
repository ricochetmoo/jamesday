<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Invite;

class InviteController extends Controller
{
	public static function generate(Request $request)
	{
		$unique = false;

		while (!$unique)
		{
			$token = random_int(0, 999999);

			if (!Invite::where('token', $token)->first())
			{
				$unique = true;
			}
		}

		$invite = new Invite();

		$invite->first_name = $request->first_name;
		$invite->last_name = $request->last_name;
		$invite->email = $request->email;
		$invite->token = $token;
		$invite->used = false;

		$invite->save();
	}
	
	public static function checkAndRedirect($token)
	{
		if ($invite = InviteController::find($token))
		{
			if (!$invite->used)
			{
				return view('booking.register')->with('invite', $invite);
			}
			else
			{
				return view('error')->with('message', "This invite has already been used.");
			}
		}
		else
		{
			return view('error')->with('message', "Invalid invite.");
		}
	}

	public static function find($token)
	{
		return Invite::where('token', $token)->first();
	}

	public static function markAsUsed($invite)
	{
		$invite->used = true;
		$invite->save();
	}
}
