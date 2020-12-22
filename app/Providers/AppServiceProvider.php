<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
	
use Illuminate\Support\Facades\Blade;
use App\View\Components\Alert;

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
        Blade::component('package-alert', Alert::class);
        Schema::defaultStringLength(191);
        view()->composer('partial-categories.show',function($view){
            $category = Category::all();
            $view->with('categories',$category);
        });
    }
}
