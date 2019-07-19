<?php

namespace App\Http\Middleware;

use Closure;
use App\Facades\UserManager;

class GDRPComplianceNotification
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
		if(!session('gdpr_notified'))
		{
			session()->flash('alert', 'This website uses cookies. To consent - continue using the website.');
			session()->flash('alert_type', 'info');

			session(['gdpr_notified' => true]);
		}

        return $next($request);
    }
}
