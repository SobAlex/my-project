<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminBlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('blogs')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new BlogCategory();
        return view('admin.blog-categories.create', compact('category'));
    }

    public function store(StoreBlogCategoryRequest $request)
    {
        $data = $request->validated();

        // Обрабатываем чекбокс is_active
        $data['is_active'] = (bool) $data['is_active'];

        // Генерируем slug если не указан
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Проверяем уникальность slug и генерируем уникальный если нужно
        $originalSlug = $data['slug'];
        $counter = 1;
        while (BlogCategory::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        BlogCategory::create($data);

        Session::flash('success', 'Категория блога успешно создана!');
        return redirect()->route('admin.blog-categories.index');
    }

    public function show(BlogCategory $blogCategory)
    {
        $blogCategory->load('blogs');
        return view('admin.blog-categories.show', compact('blogCategory'));
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    public function update(UpdateBlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $data = $request->validated();

        // Обрабатываем чекбокс is_active
        $data['is_active'] = (bool) $data['is_active'];

        // Проверяем, пытается ли пользователь деактивировать категорию с статьями
        if (!$data['is_active'] && $blogCategory->is_active && $blogCategory->blogs()->count() > 0) {
            $articlesCount = $blogCategory->blogs()->count();

            // Если не указан флаг принудительной деактивации
            if (!isset($data['force_deactivate'])) {
                Session::flash('warning', "Категория содержит {$articlesCount} статей. При деактивации они будут скрыты с сайта. Если вы уверены, отметьте галочку 'Принудительно деактивировать' и сохраните снова.");
                return redirect()->back()->withInput();
            }
        }

        // Генерируем slug если не указан
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Проверяем уникальность slug и генерируем уникальный если нужно
        if ($data['slug'] !== $blogCategory->slug) {
            $originalSlug = $data['slug'];
            $counter = 1;
            while (BlogCategory::where('slug', $data['slug'])->where('id', '!=', $blogCategory->id)->exists()) {
                $data['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        $blogCategory->update($data);

        if (!$data['is_active'] && $blogCategory->blogs()->count() > 0) {
            Session::flash('success', "Категория деактивирована! {$articlesCount} статей скрыты с сайта.");
        } else {
            Session::flash('success', 'Категория блога успешно обновлена!');
        }

        return redirect()->route('admin.blog-categories.index');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        // Проверяем, есть ли связанные блоги
        if ($blogCategory->blogs()->count() > 0) {
            Session::flash('error', 'Нельзя удалить категорию, к которой привязаны статьи блога!');
            return redirect()->back();
        }

        $blogCategory->delete();

        Session::flash('success', 'Категория блога успешно удалена!');
        return redirect()->route('admin.blog-categories.index');
    }
}
