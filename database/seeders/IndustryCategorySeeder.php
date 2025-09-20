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
        // Создаем 3 категории отраслей - только количество, данные в фабрике
        IndustryCategory::factory()
            ->count(3)
            ->create();
    }
}
