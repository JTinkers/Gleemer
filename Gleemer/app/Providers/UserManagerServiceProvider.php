<?php

namespace App\Providers;

use App\Http\Facades\UserManager;
use Illuminate\Support\ServiceProvider;

class UserManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->bind('usermanager', function()
        {
            return new \App\Helpers\Facades\UserManager;
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
