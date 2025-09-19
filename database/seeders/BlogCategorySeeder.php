<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'SEO новости',
                'slug' => 'seo-news',
                'description' => 'Последние новости и обновления в мире SEO',
                'color' => '#06b6d4',
                'icon' => 'trending_up',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Аналитика',
                'slug' => 'analytics',
                'description' => 'Аналитические материалы и исследования',
                'color' => '#8b5cf6',
                'icon' => 'analytics',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Советы',
                'slug' => 'tips',
                'description' => 'Практические советы и рекомендации',
                'color' => '#10b981',
                'icon' => 'tips_and_updates',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Техническая оптимизация',
                'slug' => 'technical-optimization',
                'description' => 'Технические аспекты оптимизации сайтов',
                'color' => '#f59e0b',
                'icon' => 'code',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Контент-маркетинг',
                'slug' => 'content-marketing',
                'description' => 'Стратегии и методы контент-маркетинга',
                'color' => '#ef4444',
                'icon' => 'description',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
