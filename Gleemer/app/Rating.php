<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
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
