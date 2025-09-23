<?php

namespace App\Providers;

use App\Services\BlogService;
use App\Services\CaseService;
use App\Services\ContactService;
use App\Services\ImageService;
use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CaseService::class);
        $this->app->singleton(BlogService::class);
        $this->app->singleton(ContactService::class);
        $this->app->singleton(ImageService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

