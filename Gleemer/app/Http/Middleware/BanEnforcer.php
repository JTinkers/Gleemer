<?php

namespace App\Http\Middleware;

use Closure;
use \Facades\UserManager;

class BanEnforcer
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
		if(UserManager::get() && UserManager::get()->isBanned)
		{
			return redirect('/youre_banned');
		}

        return $next($request);
    }
}
