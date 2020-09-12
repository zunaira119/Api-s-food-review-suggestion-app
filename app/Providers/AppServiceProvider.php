<?php

namespace App\Providers;

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
        if(isset($setting_value)) {
            define('UPLOADS_EMAIL_PATH','public/email/');
            define('UPLOADS_PROFILE_PATH', 'public/uploads/');
            define('UPLOADS_PROFILE', 'public/uploads/Profile/');
        }
    }
}
