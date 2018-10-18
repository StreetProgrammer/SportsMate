<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('Owner-only', function ($user) {
            if ( in_array($user->type, [2]) ) { // if user->type == 2  ==> user == owner
                return true ;
            } else {
                return false ;
            }
        });

        Gate::define('Admin-only', function ($user) {
            if ( in_array($user->type, [3]) ) { // if user->type == 2  ==> user == owner
                return true ;
            } else {
                return false ;
            }
        });

        Gate::define('Manager-only', function ($user) {
            if ( in_array($user->type, [4]) ) { // if user->type == 2  ==> user == owner
                return true ;
            } else {
                return false ;
            }
        });

        Gate::define('Owner-Admin-only', function ($user) {
            if ( in_array($user->type, [2, 3]) ) { // if user->type == 2 || 3  ==> user == owner || Admin
                return true ;
            } else {
                return false ;
            }
        });
    }
}
