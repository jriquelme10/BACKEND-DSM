<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
    { {
            Gate::define('admin', function ($user) {
                if ($user->rol == 'administrativo') {
                    return true;
                }
                return false;
            });

            Gate::define('estilista', function ($user) {
                if ($user->rol == 'estilista') {
                    return true;
                }
                return false;
            });

            Gate::define('cliente', function ($user) {
                if ($user->rol == 'cliente') {
                    return true;
                }
                return false;
            });
        }
    }
}
