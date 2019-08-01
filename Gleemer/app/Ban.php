<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ban extends Model
{
	protected $guarded = ['_token'];

	public $timestamps = false;

	public function admin()
	{
		return $this->belongsTo('App\User', 'admin_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function getHumanUnbanDateAttribute()
	{
		$date = new Carbon($this->attributes['date_banned']);
		$date->addSeconds($this->attributes['length']);

		return $date->diffForHumans();
	}
}
