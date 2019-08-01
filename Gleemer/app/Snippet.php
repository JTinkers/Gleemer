<?php

namespace App;

use App\Http\Facades\UserManager;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Snippet extends Model
{
	protected $guarded = ['_token'];

	protected $hidden = ['favourites', 'comments'];

	protected $appends = ['is_visible_to_user', 'human_date_posted', 'favourites_count', 'comments_count'];

	public $timestamps = false;

	public function getFavouritesCountAttribute()
	{
		return $this->favourites->count();
	}

	public function getCommentsCountAttribute()
	{
		return $this->comments->count();
	}

	public function getIsVisibleToUserAttribute()
	{
		switch ($this->visibility_mode)
		{
			case 'public':
				return true;
				break;

			case 'private':
				return UserManager::get()
					&& (UserManager::get()->id == $this->user_id
					|| boolval(UserManager::get()->flags & config('gleemer.power_flags')::ViewPrivateSnippet));
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
		$url = preg_replace("/[^A-Za-z0-9 ]/", '_', $url);
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
