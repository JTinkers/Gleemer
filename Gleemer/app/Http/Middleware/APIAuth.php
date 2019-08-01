<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use \Facades\UserManager;

class APIAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if($request->api_key == null)
		{
			return abort(400, 'Missing API Key');
		}

		$user = User::where('api_key', $request->api_key)->get()->first();

		UserManager::set($user);

		if(!$user)
		{
			return abort(401);
		}

        return $next($request);
    }
}
