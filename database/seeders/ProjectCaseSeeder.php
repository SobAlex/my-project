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
        // Создаем 6 кейсов как указано в требованиях
        ProjectCase::factory()
            ->count(6)
            ->create();
    }
}
