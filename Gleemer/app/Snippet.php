<?php

namespace App;

use App\Http\Facades\UserManager;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Snippet extends Model
{
	protected $guarded = ['_token'];

	public $timestamps = false;

	public function getIsFavouritedAttribute()
	{
		if(!UserManager::get())
		{
			return false;
		}

		$favourite = $this->favourites()->where('snippet_id', $this->id)->where('user_id', UserManager::get()->id)->first();

		if($favourite)
		{
			return true;
		}

		return false;
	}

	public function getLanguageAttribute()
	{
		return ucfirst($this->attributes['language']);
	}

	public function getHumanDatePostedAttribute()
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

		$url = "/snippet/show/slug/" . $url;

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
