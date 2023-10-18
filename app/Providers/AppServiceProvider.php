<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
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
        // Define blade Directives for currency and discounts here
        Blade::directive('money', function ($amount) {
            return "<?php echo showAmount($amount); ?>";
        });;
        Blade::directive('activeroute', function ($route) {
            return activeRoute($route);
        });



        try {
            $settings = Site::find(1);
            config(['settings' => $settings]);
            $categories = Category::where('status', 1)->get();
            view()->composer('frontend.layouts.partials.navbar', function ($view) use ($categories) {
                $view->with([
                    'categories' => $categories
                ]);
            });
        } catch (\Throwable $th) {
            return;
        }
    }
}
