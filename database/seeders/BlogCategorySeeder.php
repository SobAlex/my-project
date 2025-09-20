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
        // Создаем 4 категории блогов - только количество, данные в фабрике
        BlogCategory::factory()
            ->count(4)
            ->create();
    }
}
