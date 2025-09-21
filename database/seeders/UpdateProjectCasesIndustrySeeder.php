<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectCase;
use App\Models\IndustryCategory;

class UpdateProjectCasesIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Map old industry values to their corresponding slugs
        $legacyIndustrySlugs = [
            'clothing' => 'clothing',
            'production' => 'production',
            'electronics' => 'electronics',
            'furniture' => 'furniture',
        ];

        // Ensure default categories exist
        foreach ($legacyIndustrySlugs as $slug) {
            IndustryCategory::firstOrCreate(['slug' => $slug], ['name' => ucfirst(str_replace('-', ' ', $slug))]);
        }

        // Update existing cases to use industry_category_id
        $cases = ProjectCase::all();
        foreach ($cases as $case) {
            if ($case->industry && !is_numeric($case->industry)) { // Check if it's an old string industry
                $industrySlug = $legacyIndustrySlugs[$case->industry] ?? null;
                if ($industrySlug) {
                    $industryCategory = IndustryCategory::where('slug', $industrySlug)->first();
                    if ($industryCategory) {
                        $case->industry_category_id = $industryCategory->id;
                        $case->save();
                    }
                }
            }
        }
    }
}
