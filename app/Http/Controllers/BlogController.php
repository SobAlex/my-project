<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(
        private BlogService $blogService
    ) {}

    // Главная страница блога
    public function index()
    {
        $articles = $this->blogService->getPublishedPosts();
        return view('blog.index', compact('articles'));
    }

    // SEO новости
    public function seoNews()
    {
        $data = $this->blogService->getPostsByCategory('seo-news');
        $data['category'] = 'SEO новости';
        return view('blog.category', $data);
    }

    // Аналитика
    public function analytics()
    {
        $data = $this->blogService->getPostsByCategory('analytics');
        $data['category'] = 'Аналитика';
        return view('blog.category', $data);
    }

    // Советы
    public function tips()
    {
        $data = $this->blogService->getPostsByCategory('tips');
        $data['category'] = 'Советы';
        return view('blog.category', $data);
    }

    // Универсальный метод для всех категорий блогов
    public function category($categorySlug)
    {
        $data = $this->blogService->getPostsByCategory($categorySlug);

        if (!$data['blogCategory']) {
            abort(404);
        }

        return view('blog.category', $data);
    }

    // Показать конкретную статью (включая неопубликованные)
    public function show($category, $slug)
    {
        $article = $this->blogService->getPostByCategoryAndSlugWithUnpublished($category, $slug);

        if (!$article) {
            abort(404);
        }

        $relatedArticles = $this->blogService->getRelatedPosts($article);

        return view('blog.article', compact('article', 'relatedArticles'));
    }

    // Показать статью без категории (включая неопубликованные)
    public function showWithoutCategory($slug)
    {
        $article = $this->blogService->getPostBySlugWithUnpublished($slug);

        if (!$article) {
            abort(404);
        }

        $relatedArticles = $this->blogService->getRelatedPosts($article);

        return view('blog.article', compact('article', 'relatedArticles'));
    }

    // Получить последние статьи для главной страницы
    public function getLatestArticlesForHomepage($limit = 4)
    {
        return $this->blogService->getLatestPostsForHomepage($limit);
    }
}
