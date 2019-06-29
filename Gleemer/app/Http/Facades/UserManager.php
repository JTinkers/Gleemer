<?php

namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class UserManager extends Facade
{
	public static function set($user)
	{
		session(['user' => $user]);
	}

	public static function get()
	{
		if(session('user'))
		{
			return session('user');
		}

		return null;
	}

	protected static function getFacadeAccessor() { return 'usermanager'; }
}
