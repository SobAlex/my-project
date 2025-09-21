<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Главная страница блога
    public function index()
    {
        $articles = Blog::published()
            ->with('blogCategory')
            ->whereHas('blogCategory', function($query) {
                $query->where('is_active', true);
            })
            ->ordered()
            ->paginate(12);

        return view('blog.index', compact('articles'));
    }

    // SEO новости
    public function seoNews()
    {
        $blogCategory = \App\Models\BlogCategory::where('slug', 'seo-news')
            ->where('is_active', true)
            ->first();

        $articles = Blog::published()
            ->with('blogCategory')
            ->whereHas('blogCategory', function($query) {
                $query->where('slug', 'seo-news')->where('is_active', true);
            })
            ->ordered()
            ->paginate(12);

        // Получаем все активные категории для блока "Другие категории"
        $activeBlogCategories = $this->getActiveBlogCategories();

        return view('blog.category', [
            'articles' => $articles,
            'category' => 'SEO новости',
            'categorySlug' => 'seo-news',
            'blogCategory' => $blogCategory,
            'activeBlogCategories' => $activeBlogCategories
        ]);
    }

    // Аналитика
    public function analytics()
    {
        $blogCategory = \App\Models\BlogCategory::where('slug', 'analytics')
            ->where('is_active', true)
            ->first();

        $articles = Blog::published()
            ->with('blogCategory')
            ->whereHas('blogCategory', function($query) {
                $query->where('slug', 'analytics')->where('is_active', true);
            })
            ->ordered()
            ->paginate(12);

        // Получаем все активные категории для блока "Другие категории"
        $activeBlogCategories = $this->getActiveBlogCategories();

        return view('blog.category', [
            'articles' => $articles,
            'category' => 'Аналитика',
            'categorySlug' => 'analytics',
            'blogCategory' => $blogCategory,
            'activeBlogCategories' => $activeBlogCategories
        ]);
    }

    // Советы
    public function tips()
    {
        $blogCategory = \App\Models\BlogCategory::where('slug', 'tips')
            ->where('is_active', true)
            ->first();

        $articles = Blog::published()
            ->with('blogCategory')
            ->whereHas('blogCategory', function($query) {
                $query->where('slug', 'tips')->where('is_active', true);
            })
            ->ordered()
            ->paginate(12);

        // Получаем все активные категории для блока "Другие категории"
        $activeBlogCategories = $this->getActiveBlogCategories();

        return view('blog.category', [
            'articles' => $articles,
            'category' => 'Советы',
            'categorySlug' => 'tips',
            'blogCategory' => $blogCategory,
            'activeBlogCategories' => $activeBlogCategories
        ]);
    }

    // Универсальный метод для всех категорий блогов
    public function category($categorySlug)
    {
        // Находим категорию по slug
        $blogCategory = \App\Models\BlogCategory::where('slug', $categorySlug)
            ->where('is_active', true)
            ->first();

        if (!$blogCategory) {
            abort(404);
        }

        $articles = Blog::published()
            ->with('blogCategory')
            ->whereHas('blogCategory', function($query) use ($categorySlug) {
                $query->where('slug', $categorySlug)->where('is_active', true);
            })
            ->ordered()
            ->paginate(12);

        // Получаем все активные категории для блока "Другие категории"
        $activeBlogCategories = $this->getActiveBlogCategories();

        return view('blog.category', [
            'articles' => $articles,
            'category' => $blogCategory->name,
            'categorySlug' => $categorySlug,
            'blogCategory' => $blogCategory,
            'activeBlogCategories' => $activeBlogCategories
        ]);
    }

    // Показать конкретную статью
    public function show($category, $slug)
    {
        $article = Blog::published()
            ->with('blogCategory')
            ->whereHas('blogCategory', function($query) use ($category) {
                $query->where('slug', $category)->where('is_active', true);
            })
            ->where('slug', $slug)
            ->first();

        if (!$article) {
            abort(404);
        }

        // Получаем похожие статьи из той же категории
        $relatedArticles = Blog::published()
            ->with('blogCategory')
            ->where('id', '!=', $article->id)
            ->where('category_id', $article->category_id)
            ->ordered()
            ->limit(3)
            ->get();

        // Если похожих статей в той же категории мало, дополняем статьями из других категорий
        if ($relatedArticles->count() < 3) {
            $additionalArticles = Blog::published()
                ->with('blogCategory')
                ->where('id', '!=', $article->id)
                ->whereNotIn('id', $relatedArticles->pluck('id'))
                ->ordered()
                ->limit(3 - $relatedArticles->count())
                ->get();

            $relatedArticles = $relatedArticles->merge($additionalArticles);
        }

        return view('blog.article', compact('article', 'relatedArticles'));
    }

    // Получить последние статьи для главной страницы
    public function getLatestArticlesForHomepage($limit = 4)
    {
        return Blog::published()
            ->with('blogCategory')
            ->whereHas('blogCategory', function($query) {
                $query->where('is_active', true);
            })
            ->ordered()
            ->limit($limit)
            ->get();
    }

    // Приватный метод для получения активных категорий блогов
    private function getActiveBlogCategories()
    {
        return \App\Models\BlogCategory::active()
            ->ordered()
            ->get()
            ->map(function ($category) {
                return [
                    'slug' => $category->slug,
                    'name' => $category->name,
                    'icon' => $category->icon ?: 'article',
                    'color' => $category->color,
                    'description' => $category->description
                ];
            })
            ->toArray();
    }
}
