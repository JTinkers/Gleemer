<?php

namespace App\Providers;

use App\Http\Facades\TimeoutManager;
use Illuminate\Support\ServiceProvider;

class TimeoutManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->bind('timeoutmanager', function()
        {
            return new \App\Http\Facades\TimeoutManager;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
