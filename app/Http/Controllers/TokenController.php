<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Token;

class TokenController extends Controller
{
	public static function exists($tokenString)
	{
		if (Token::where('token', $tokenString)->first())
		{
			return true;
		}

		return false;
	}

	public static function find($tokenString)
	{
		return Token::where('token', $tokenString)->first();
	}
	
	public static function generate($user)
	{
		$unique = false;
			
		while(!$unique)
		{
			$tokenString = base64_encode(random_int(PHP_INT_MIN, PHP_INT_MAX));

			if (!TokenController::exists($tokenString))
			{
				$unique = true;
			}
		}

		$token = new Token();

		$token->token = $tokenString;
		$token->user_id = $user->id;

		$token->save();
		return $token;
	}

	public static function markAsUsed($token)
	{
		$token->used = true;
		$token->save();
	}
}
