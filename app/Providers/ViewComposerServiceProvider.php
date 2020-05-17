<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use Illuminate\Support\Facades\View;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.header', function($view){
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
        View::composer('site.partials.header', function($view){
            $view->with('cartCount', Cart::getContent()->count());
        });
    }
}
