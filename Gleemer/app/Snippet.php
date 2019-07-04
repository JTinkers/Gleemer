<?php

namespace App;

use App\Http\Facades\UserManager;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Snippet extends Model
{
	protected $guarded = ['_token'];

	public $timestamps = false;

	public function getIsVisibleToUserAttribute()
	{
		switch ($this->visibility_mode)
		{
			case 'public':
				return true;
				break;

			case 'private':
				return UserManager::get() && UserManager::get()->id == $snippet->user_id;
				break;

			case 'unlisted':
				return true;
				break;

			default:
				return false;
				break;
		}

		return true;
	}

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
