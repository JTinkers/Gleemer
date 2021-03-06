<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
	public $timestamps = false;

	public function snippet()
    {
        return $this->belongsTo('App\Snippet');
    }

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
