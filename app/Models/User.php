<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'booked_on',
		'admin',
		'coming_from',
		'can_host',
		'hosting_details',
		'needs_accom',
		'needs_parking',
		'spoons_interest',
		'tour_interest',
		'escape_room_interest',
		'badge'
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function tokens()
	{
		return $this->hasMany(Token::class);
	}

	public function plus_ones()
	{
		return $this->hasMany(PlusOne::class, 'requester_id');
	}
}
