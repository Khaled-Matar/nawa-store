<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // if($this->app->environment('production')){
            $this->app->instance('path.public', function(){
                return base_path('public_html');
        });
        // }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Schema::defaultStringLength(191);
        Paginator::useBootstrapFour();
        // View::share([
        //     'categories' => $categories,
        //     'status_options' => Product::statusOptions(),
        // ]);
    }
}
