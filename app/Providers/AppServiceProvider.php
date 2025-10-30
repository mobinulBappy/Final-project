<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();

        view()->composer("layouts.frontend-layout",function($view){
            $view->with('cart',Cart::where('customer_id',auth('customer')->id())->count())->with('categories', Category::whereHas('products')->with('subcategories')->whereNull('category_id')->latest()->get());
        });
    }
}
