<?php

namespace App\Providers;

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
        $array = [
            \App\Repositories\Category\CategoryInterface::class =>  \App\Repositories\Category\CategoryRepository::class,
            \App\Repositories\Product\ProductInterface::class =>  \App\Repositories\Product\ProductRepository::class
        ];

        foreach ($array as $interface => $repo) {
            $this->app->singleton($interface,$repo);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}