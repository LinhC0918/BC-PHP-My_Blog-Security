<?php

namespace App\Providers;

use App\Http\Repositories\Impl\PostRepositoryImpl;
use App\Http\Repositories\PostRepository;
use App\Http\Services\Impl\PostServiceImpl;
use App\Http\Services\PostService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            PostRepository::class,
            PostRepositoryImpl::class
        );
        $this->app->singleton(
            PostService::class,
            PostServiceImpl::class
        );
    }
}
