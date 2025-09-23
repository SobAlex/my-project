<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем 4 конкретные категории блогов
        $categories = [
            [
                'name' => 'SEO новости',
                'slug' => 'seo-news',
                'description' => 'Последние новости и обновления в мире SEO',
                'icon' => 'local_cafe',
                'color' => '#808080',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Аналитика',
                'slug' => 'analytics',
                'description' => 'Аналитические статьи и исследования',
                'icon' => 'analytics',
                'color' => '#06b6d4',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Советы',
                'slug' => 'tips',
                'description' => 'Практические советы и рекомендации по SEO',
                'icon' => 'lightbulb',
                'color' => '#06b6d4',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Кейсы',
                'slug' => 'cases',
                'description' => 'Разборы успешных кейсов продвижения',
                'icon' => 'trending_up',
                'color' => '#10B981',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $categoryData) {
            BlogCategory::create($categoryData);
        }
    }
}
