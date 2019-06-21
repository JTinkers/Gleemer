<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class LocaleManager
{
    public function handle($request, Closure $next)
    {
		$lang = session('locale');

		App::setLocale($lang);
		Carbon::setLocale($lang);

        return $next($request);
    }
}
