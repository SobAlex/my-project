<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class IndustryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = IndustryCategory::ordered()
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:industry_categories,slug',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        // Генерируем slug если не указан
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Устанавливаем значения по умолчанию
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['color'] = $data['color'] ?? '#3B82F6';

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
    public function update(Request $request, IndustryCategory $industryCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:industry_categories,slug,' . $industryCategory->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        // Генерируем slug если не указан
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Устанавливаем значения по умолчанию
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['color'] = $data['color'] ?? '#3B82F6';

        $industryCategory->update($data);

        Session::flash('success', 'Категория отрасли успешно обновлена!');
        return redirect()->route('admin.industry-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndustryCategory $industryCategory)
    {
        $industryCategory->delete();

        Session::flash('success', 'Категория отрасли успешно удалена!');
        return redirect()->route('admin.industry-categories.index');
    }
}
