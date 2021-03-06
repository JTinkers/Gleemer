<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
	protected $guarded = ['_token'];

	public $timestamps = false;

	public function snippet()
	{
		return $this->belongsTo('App\Snippet');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
