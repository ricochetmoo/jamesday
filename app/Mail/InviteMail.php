<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteMail extends Mailable
{
	use Queueable, SerializesModels;

	public $first_name;
	public $token;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($first_name, $token)
	{
		$this->first_name = $first_name;
		$this->token = $token;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->subject('You\'re invited to the 2022 Jamesday Celebrations')->view('mail.invite');
	}
}
