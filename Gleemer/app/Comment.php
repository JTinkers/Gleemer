<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public function user()
	{
		return $this->belongsTo('App\User', 'userId');
	}

	public function snippet()
	{
		return $this->belongsTo('App\Snippet', 'snippetId');
	}
}
