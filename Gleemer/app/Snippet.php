<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Snippet extends Model
{
	protected $guarded = ['_token'];

    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public function views()
    {
        return $this->hasMany('App\View', 'snippetId');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating', 'snippetId');
    }

	public function favourites()
	{
		return $this->hasMany('App\Favourite', 'snippetId');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment', 'snippetId');
	}

	public function getDatePosted()
	{
		$date = new Carbon($this->datePosted);

		return $date->diffForHumans();
	}
}
