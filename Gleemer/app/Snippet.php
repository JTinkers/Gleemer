<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Snippet extends Model
{
	public function views()
	{
		return $this->hasMany('App\View');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function ratings()
	{
		return $this->hasMany('App\Rating');
	}

	public function favourites()
	{
		return $this->hasMany('App\Favourite');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function getDatePostedAttribute()
	{
		$date = new Carbon($this->attributes['date_posted']);

		return $date->diffForHumans();
	}
}
