<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        Gate::define('isAdmin', function ($user) {
            return $user->type == 'admin';
        });

        Gate::define('isUser', function ($user) {
            return $user->type == 'user';
        });

        Gate::define('isGuest', function ($user) {
            return $user->type == 'guest';
        });

        // PayPal configuration
        /*define('PAYPAL_URL', (env("PAYPAL_SANDBOX") == TRUE)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
        define('PAYPAL_ID', 'sb-7sevq3486597@personal.example.com');
        define('PAYPAL_RETURN_URL', 'http://cvgig/paypal/success');
        define('PAYPAL_CANCEL_URL', 'http://cvgig/paypal/cancel');
        define('PAYPAL_NOTIFY_URL', 'http://cvgig/paypal/ipn');
        define('PAYPAL_CURRENCY', 'INR');*/
    }
}
