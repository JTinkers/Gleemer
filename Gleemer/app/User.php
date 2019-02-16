<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function snippets()
    {
        return $this->hasMany('App\Snippet', 'userId');
    }

    public function views()
    {
        return $this->hasMany('App\View', 'userId');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating', 'userId');
    }
}
