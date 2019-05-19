<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
	public function admin()
	{
		return $this->belongsTo('App\User', 'admin_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
