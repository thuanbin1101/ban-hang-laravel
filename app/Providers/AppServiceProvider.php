<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrapFive();
        View::share('categories', Category::where('parent_id', '=', 0)->with('getChildren')->get());
        View::share('menus', Menu::where('parent_id', '=', 0)->with('getChildren')->get());
        View::share('products', Product::get());
    }
}
