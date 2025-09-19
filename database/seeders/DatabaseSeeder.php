<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // Запускаем сидеры
        $this->call([
            IndustryCategorySeeder::class,
            ProjectCaseSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            ContactSettingSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
