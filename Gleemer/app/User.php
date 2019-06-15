<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $hidden = ['login', 'password', 'email'];

	public $timestamps = false;

	public function bans()
	{
		return $this->hasMany('App\Ban');
	}

	public function snippets()
	{
		return $this->hasMany('App\Snippet');
	}

	public function views()
	{
		return $this->hasMany('App\View');
	}

	public function ratings()
	{
		return $this->hasMany('App\Rating');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function favourites()
	{
		return $this->hasMany('App\Favourite');
	}
}
