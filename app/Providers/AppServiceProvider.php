<?php

namespace App\Providers;

use App\Models\Meat;
use App\Models\Seafood;
use App\Models\Vegefruit;
use App\Models\CartItem;
use App\Models\Procedure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $vegefruits = Vegefruit::all();
            $view->with('vegefruits', $vegefruits);
        });

        View::composer('*', function ($view) {
            $meats = Meat::all();
            $view->with('meats', $meats);
        });

        View::composer('*', function ($view) {
            $seafoods = Seafood::all();
            $view->with('seafoods', $seafoods);
        });

        View::composer('*', function ($view) {
            $cart = CartItem::all();
            $view->with('cart_items', $cart);
        });

        View::composer('*', function ($view) {
            $procedure = Procedure::all();
            $view->with('procedures', $procedure);
        });
    }
}
