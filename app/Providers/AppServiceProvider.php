<?php

namespace App\Providers;

use App\Models\Site;
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
        try {
            $settings = Site::find(1);
            config(['settings' => $settings]);
        } catch (\Throwable $th) {
            return;
        }
    }
}
