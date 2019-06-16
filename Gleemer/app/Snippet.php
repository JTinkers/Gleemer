<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Snippet extends Model
{
	protected $guarded = ['_token'];

	public $timestamps = false;

	public function getLanguageAttribute()
	{
		return ucfirst($this->attributes['language']);
	}

	public function getDatePostedAttribute()
	{
		$date = new Carbon($this->attributes['date_posted']);

		return $date->diffForHumans();
	}

	public function getSlugAttribute()
	{
		$url = str_replace(" ", "-", $this->title);
		$url = strtolower($url);
		$url = str_replace("&", "_", $url);
		$url = str_replace(";", "_", $url);
		$url = str_replace("\\", "_", $url);
		$url = str_replace("/", "_", $url);

		$url = "/snippet/show/" . $url;

		return $url;
	}

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
}
