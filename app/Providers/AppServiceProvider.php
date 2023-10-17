<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Support\Facades\Blade;
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
        Blade::directive('money', function($amount){
            return "<? echo showAmount($amount); ?>";
        });
        try {
            $settings = Site::find(1);
            config(['settings' => $settings]);
            $categories = Category::where('status',1)->get();
            view()->composer('frontend.layouts.partials.navbar', function($view) use ($categories){
                $view->with([
                    'categories'=>$categories
                ]);
            });

        } catch (\Throwable $th) {
            return;
        }
    }
}
