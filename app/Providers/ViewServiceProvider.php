<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\IndustryCategory;
use App\Models\BlogCategory;
use App\Models\ContactSetting;

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
            // Категории кейсов
            $activeCategories = IndustryCategory::active()
                ->ordered()
                ->get()
                ->map(function ($category) {
                    return [
                        'slug' => $category->slug,
                        'name' => $category->name,
                        'icon' => $category->icon ?: 'business',
                        'color' => $category->color,
                        'route' => 'cases.category',
                        'route_params' => [$category->slug]
                    ];
                })
                ->toArray();

            // Категории блогов
            $activeBlogCategories = BlogCategory::active()
                ->ordered()
                ->get()
                ->map(function ($category) {
                    return [
                        'slug' => $category->slug,
                        'name' => $category->name,
                        'icon' => $category->icon ?: 'article',
                        'color' => $category->color,
                        'route' => 'blog.category'
                    ];
                })
                ->toArray();

            // Контактные данные
            $contactSettings = ContactSetting::getAllSettings();
            $contactInfo = [
                'address' => $contactSettings['address'] ?? 'Адрес не указан',
                'phone' => $contactSettings['phone'] ?? 'Телефон не указан',
                'email' => $contactSettings['email'] ?? 'Email не указан',
                'working_hours' => $contactSettings['working_hours'] ?? 'Часы работы не указаны',
                'social' => [
                    'telegram' => $contactSettings['social_telegram'] ?? null,
                    'whatsapp' => $contactSettings['social_whatsapp'] ?? null,
                    'vk' => $contactSettings['social_vk'] ?? null,
                ]
            ];

            $view->with([
                'activeCategories' => $activeCategories,
                'activeBlogCategories' => $activeBlogCategories,
                'contactInfo' => $contactInfo
            ]);
        });
    }
}
