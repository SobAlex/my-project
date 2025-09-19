<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\IndustryCategory;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Передаем активные категории во все представления
        View::composer('*', function ($view) {
            $activeCategories = IndustryCategory::active()
                ->ordered()
                ->get()
                ->map(function ($category) {
                    return [
                        'slug' => $category->slug,
                        'name' => $category->name,
                        'icon' => $category->icon ?: 'business',
                        'color' => $category->color,
                        'route' => 'cases.category'
                    ];
                })
                ->toArray();

            $view->with('activeCategories', $activeCategories);
        });
    }
}
