<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscordBotController extends Controller
{
	function sendMessage($message)
	{
		$content =
		[
			'content' => $message
		];

		$json = json_encode($content);
		
		$ch = curl_init(env('DISCORD_WEBHOOK_URL'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_exec($ch);
		curl_close($ch);

		return true;
	}
}
