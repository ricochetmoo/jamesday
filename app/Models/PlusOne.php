<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlusOne extends Model
{
	use HasFactory;

	protected $fillable =
	[
		'requester_id',
		'status',
		'first_name',
		'last_name',
		'email',
	];

	public function requester()
	{
		return $this->belongsTo(User::class, 'requester_id');
	}
}
