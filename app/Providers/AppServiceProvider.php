<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //Schema::defaultstringLength(191);
        Blade::directive('routeactive', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? 'class=\"active nav-link\"' : 'class=\"nav-link\"' ?>";
        });
    }
}
