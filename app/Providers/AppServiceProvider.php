<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // role_as = 0 User, 1 Employee, 2 Supervisor, 3 Admin
        Blade::if('role_is', function ($role){
            if (auth()->user()->role_as == $role) {
                return 1;
            }
            return 0;
        });
    }
}
