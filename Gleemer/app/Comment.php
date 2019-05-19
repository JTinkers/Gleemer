<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public function getContentAttribute()
	{
		if($this->is_deleted)
		{
			return "[Deleted]";
		}

		return $this->attributes['content'];
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
