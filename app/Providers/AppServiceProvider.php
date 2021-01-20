<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
         // CUSTOM VALIDATION RULES
        
        // INPUTS
        Validator::extend('alpha_space', function ($attribute, $value) {
            // This will only accept alpha and spaces. 
            return preg_match('/^[\pL\s]+$/u', $value); 
        });
        Validator::extend('alpha_dash_space', function ($attribute, $value) {
            // This will only accept alpha and spaces and hyphen. 
            return preg_match('/^[\pL\s-]+$/u', $value); 
        });
        Validator::extend('alpha_capital', function ($attribute, $value) {
            // This will only accept capital letters seperate with space
            return preg_match('/^[A-Z]+$/', $value); 
        });
        Validator::extend('address', function ($attribute, $value) {
            // This will only accept alphanumerics, spaces,[: . / - _ ].
            return preg_match('/^[a-zA-Z0-9\s\:|\,|\.|\/|\-|_]*$/', $value); 
        });
        // /INPUTS

        // /CUSTOM VALIDATION RULES
    }
}
