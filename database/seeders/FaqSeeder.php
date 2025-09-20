<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем FAQ используя фабрику
        Faq::factory()
            ->count(6)
            ->create();
    }
}
