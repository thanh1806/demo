<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Handle\HandleInterface;
use App\Repositories\Handle\ImageHandleRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(HandleInterface::class, ImageHandleRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
    }
}
