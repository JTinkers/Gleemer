<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
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
}
