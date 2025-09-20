<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаем пользователей
        User::factory(5)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Запускаем сидеры в правильном порядке
        $this->call([
            // Сначала создаем категории
            IndustryCategorySeeder::class,
            BlogCategorySeeder::class,

            // Затем создаем контент, который зависит от категорий
            ProjectCaseSeeder::class,
            BlogSeeder::class,

            // Настройки и FAQ не зависят от других моделей
            ContactSettingSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
