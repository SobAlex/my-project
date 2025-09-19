<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = new Blog();
        $categories = BlogCategory::active()->ordered()->pluck('name', 'slug')->toArray();

        return view('admin.blogs.create', compact('blog', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = 1; // Временно используем ID 1

        // Генерируем slug если не указан
        if (empty($data['slug'])) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        }

        // Проверяем уникальность slug и генерируем уникальный если нужно
        $originalSlug = $data['slug'];
        $counter = 1;
        while (Blog::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Устанавливаем published_at если статья публикуется
        if ($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        Blog::create($data);

        Session::flash('success', 'Статья блога успешно создана!');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load('user');
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::active()->ordered()->pluck('name', 'slug')->toArray();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        // Генерируем slug если не указан
        if (empty($data['slug'])) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        }

        // Проверяем уникальность slug и генерируем уникальный если нужно
        if ($data['slug'] !== $blog->slug) {
            $originalSlug = $data['slug'];
            $counter = 1;
            while (Blog::where('slug', $data['slug'])->where('id', '!=', $blog->id)->exists()) {
                $data['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        // Устанавливаем published_at если статья публикуется и ранее не была опубликована
        if ($data['is_published'] && !$blog->published_at && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $blog->update($data);

        Session::flash('success', 'Статья блога успешно обновлена!');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        Session::flash('success', 'Статья блога успешно удалена!');
        return redirect()->route('admin.blogs.index');
    }
}
