<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
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
        view()->composer('components.layout', function ($view) {
            $view->with('current_locale',App::getLocale());
            $view->with('all_locales',config('app.all_locales'));
        });

        view()->composer('auth.login', function ($view) {
            $view->with('current_locale',App::getLocale());
            $view->with('all_locales',config('app.all_locales'));
        });

        view()->composer('auth.register', function ($view) {
            $view->with('current_locale',App::getLocale());
            $view->with('all_locales',config('app.all_locales'));
        });

        view()->composer('seller.seller', function ($view) {
            $view->with('current_locale',App::getLocale());
            $view->with('all_locales',config('app.all_locales'));
        });

        view()->composer('account.account', function ($view) {
            $view->with('current_locale',App::getLocale());
            $view->with('all_locales',config('app.all_locales'));
        });

        view()->composer('storeForm', function ($view) {
            $view->with('current_locale',App::getLocale());
            $view->with('all_locales',config('app.all_locales'));
        });
    }
}
