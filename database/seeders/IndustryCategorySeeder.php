<?php

namespace Database\Seeders;

use App\Models\IndustryCategory;
use Illuminate\Database\Seeder;

class IndustryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем 4 конкретные категории отраслей
        $categories = [
            [
                'name' => 'Одежда',
                'slug' => 'clothing',
                'description' => 'Кейсы SEO продвижения для интернет-магазинов одежды',
                'icon' => 'checkroom',
                'color' => '#FFD700',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Производство',
                'slug' => 'production',
                'description' => 'Кейсы SEO продвижения для производственных компаний',
                'icon' => 'factory',
                'color' => '#3B82F6',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Электроника',
                'slug' => 'electronics',
                'description' => 'Кейсы SEO продвижения для магазинов электроники',
                'icon' => 'devices',
                'color' => '#10B981',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Мебель',
                'slug' => 'furniture',
                'description' => 'Кейсы SEO продвижения для мебельных магазинов',
                'icon' => 'chair',
                'color' => '#8B5CF6',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $categoryData) {
            IndustryCategory::create($categoryData);
        }
    }
}
