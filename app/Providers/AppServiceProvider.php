<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


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
        Validator::extend('time', function ($attribute, $value, $parameters, $validator) {
            // Format waktu: HH:mm
            // return preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $value);
            return preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/', $value);
        });
    
        // Atau jika ingin menambahkan pesan kesalahan kustom
        Validator::replacer('time', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must be a valid time in the format HH:mm.');
        });

        Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            // Logika validasi untuk nomor telepon
            return preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/", $value);
        });
    }
}
