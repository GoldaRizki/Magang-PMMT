<?php

namespace App\Providers;

use App\Http\Controllers\UpdateDbController;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\ServiceProvider;

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
        //
        
        Gate::define('superuser', function (User $user) {
            return $user->level === 'Superuser';
        });

        Gate::define('admin', function (User $user) {
            return $user->level === 'Superuser' || $user->level === 'Admin';
        });

        Gate::define('manager', function (User $user) {
            return $user->level === 'Superuser' || $user->level === 'Manager';
        });

        Gate::define('supervisor', function (User $user) {
            return $user->level === 'Superuser' || $user->level === 'Manager' || $user->level === 'Supervisor';
        });

        Gate::define('teknisi', function (User $user) {
            return $user->level === 'Superuser' || $user->level === 'Manager' || $user->level === 'Supervisor' || $user->level === 'Teknisi';
        });



      
    

    }
}
