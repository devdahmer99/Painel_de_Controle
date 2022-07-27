<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Page;

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
        $front_menu = [
            '/' => 'Home'
        ];

        $pages = Page::all();
        foreach($pages as $page) {
            $front_menu[ $page['slug'] ] = $page['title'];
        }

        View::share('front_menu', $front_menu);
    }
}
