<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\BlogCategory;

class UpdateBlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем категории если их нет
        $categories = [
            ['name' => 'SEO новости', 'slug' => 'seo-news', 'description' => 'Новости из мира SEO'],
            ['name' => 'Аналитика', 'slug' => 'analytics', 'description' => 'Аналитические статьи'],
            ['name' => 'Советы', 'slug' => 'tips', 'description' => 'Полезные советы'],
        ];

        foreach ($categories as $categoryData) {
            BlogCategory::firstOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        // Обновляем существующие блоги
        $blogs = Blog::whereNull('category_id')->get();

        foreach ($blogs as $blog) {
            // Если есть старое поле category, пытаемся найти соответствующую категорию
            if ($blog->getAttributes()['category'] ?? null) {
                $category = BlogCategory::where('slug', $blog->getAttributes()['category'])->first();
                if ($category) {
                    $blog->update(['category_id' => $category->id]);
                }
            }
        }
    }
}
