<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryCategory;
use App\Http\Requests\StoreIndustryCategoryRequest;
use App\Http\Requests\UpdateIndustryCategoryRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class IndustryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = IndustryCategory::withCount('cases')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.industry-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new IndustryCategory();
        return view('admin.industry-categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIndustryCategoryRequest $request)
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
        while (IndustryCategory::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        IndustryCategory::create($data);

        Session::flash('success', 'Категория отрасли успешно создана!');
        return redirect()->route('admin.industry-categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(IndustryCategory $industryCategory)
    {
        $industryCategory->load('cases');
        return view('admin.industry-categories.show', compact('industryCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IndustryCategory $industryCategory)
    {
        return view('admin.industry-categories.edit', compact('industryCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIndustryCategoryRequest $request, IndustryCategory $industryCategory)
    {
        $data = $request->validated();

        // Обрабатываем чекбокс is_active
        $data['is_active'] = (bool) $data['is_active'];

        // Проверяем, пытается ли пользователь деактивировать категорию с кейсами
        if (!$data['is_active'] && $industryCategory->is_active && $industryCategory->cases()->count() > 0) {
            $casesCount = $industryCategory->cases()->count();

            // Если не указан флаг принудительной деактивации
            if (!isset($data['force_deactivate'])) {
                Session::flash('warning', "Категория содержит {$casesCount} кейсов. При деактивации они будут скрыты с сайта. Если вы уверены, отметьте галочку 'Принудительно деактивировать' и сохраните снова.");
                return redirect()->back()->withInput();
            }
        }

        // Генерируем slug если не указан
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Проверяем уникальность slug и генерируем уникальный если нужно
        if ($data['slug'] !== $industryCategory->slug) {
            $originalSlug = $data['slug'];
            $counter = 1;
            while (IndustryCategory::where('slug', $data['slug'])->where('id', '!=', $industryCategory->id)->exists()) {
                $data['slug'] = $originalSlug . '-' . $counter;
                $counter++;
            }
        }

        $industryCategory->update($data);

        if (!$data['is_active'] && $industryCategory->cases()->count() > 0) {
            Session::flash('success', "Категория деактивирована! {$casesCount} кейсов скрыты с сайта.");
        } else {
            Session::flash('success', 'Категория отрасли успешно обновлена!');
        }

        return redirect()->route('admin.industry-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndustryCategory $industryCategory)
    {
        // Проверяем, есть ли связанные кейсы
        if ($industryCategory->cases()->count() > 0) {
            Session::flash('error', 'Нельзя удалить категорию, к которой привязаны кейсы!');
            return redirect()->back();
        }

        $industryCategory->delete();

        Session::flash('success', 'Категория отрасли успешно удалена!');
        return redirect()->route('admin.industry-categories.index');
    }
}
