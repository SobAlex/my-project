<?php

namespace Database\Seeders;

use App\Models\ProjectCase;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем 8 кейсов
        ProjectCase::factory()
            ->count(8)
            ->create();
    }
}
