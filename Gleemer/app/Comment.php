<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
	protected $guarded = ['_token'];

	public $timestamps = false;

	public function getContentAttribute()
	{
		if($this->is_deleted)
		{
			return "[Deleted]";
		}

		return $this->attributes['content'];
	}

	public function getDatePostedAttribute()
	{
		$date = new Carbon($this->attributes['date_posted']);

		return $date->diffForHumans();
	}

	public function snippet()
	{
		return $this->belongsTo('App\Snippet');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
