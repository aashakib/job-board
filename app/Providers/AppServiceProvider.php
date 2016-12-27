<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('not_html', function ($attribute, $value, $parameters, $validator) {
            $pass = false;
            $pattern = '/^[a-zA-Z0-9 "!?_-]+$/';
            preg_match($pattern, $value, $matches);
            if (!empty($matches)) {
                $pass = true;
            }
            return $pass;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
