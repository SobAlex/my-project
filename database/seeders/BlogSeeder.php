<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем 8 статей блога как указано в требованиях
        Blog::factory()
            ->count(8)
            ->published()
            ->create();
    }
}
