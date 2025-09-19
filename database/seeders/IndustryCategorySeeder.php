<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IndustryCategory;

class IndustryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Электроника',
                'slug' => 'electronics',
                'description' => 'Компании, занимающиеся производством и продажей электронных устройств',
                'icon' => 'devices',
                'color' => '#3B82F6',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Производство',
                'slug' => 'production',
                'description' => 'Промышленные предприятия и производственные компании',
                'icon' => 'factory',
                'color' => '#10B981',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Одежда',
                'slug' => 'clothing',
                'description' => 'Модная индустрия, текстильные компании и розничная торговля одеждой',
                'icon' => 'checkroom',
                'color' => '#F59E0B',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Мебель',
                'slug' => 'furniture',
                'description' => 'Производители и продавцы мебели для дома и офиса',
                'icon' => 'chair',
                'color' => '#8B5CF6',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Автомобили',
                'slug' => 'automotive',
                'description' => 'Автомобильная промышленность, дилеры и сервисные центры',
                'icon' => 'directions_car',
                'color' => '#EF4444',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Недвижимость',
                'slug' => 'real-estate',
                'description' => 'Агентства недвижимости, застройщики и риелторы',
                'icon' => 'home',
                'color' => '#06B6D4',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            IndustryCategory::create($category);
        }
    }
}
