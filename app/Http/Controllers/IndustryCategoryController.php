<?php

namespace App\Http\Controllers;

use App\Models\IndustryCategory;
use App\Services\CaseService;
use Illuminate\Http\Request;

class IndustryCategoryController extends Controller
{
    public function __construct(
        private CaseService $caseService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = IndustryCategory::orderBy('sort_order')->get();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $industryCategory = IndustryCategory::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Категория индустрии успешно создана.',
            'data' => $industryCategory
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(IndustryCategory $industryCategory)
    {
        return response()->json($industryCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IndustryCategory $industryCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $industryCategory->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Категория индустрии успешно обновлена.',
            'data' => $industryCategory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndustryCategory $industryCategory)
    {
        $industryCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Категория индустрии успешно удалена.'
        ]);
    }

    // ============================================================================
    // API METHODS
    // ============================================================================

    /**
     * Get active industry categories for API.
     */
    public function getActive()
    {
        $categories = $this->caseService->getActiveCategories();
        return response()->json($categories);
    }

    /**
     * Get categories for cases index page.
     */
    public function getForCasesIndex()
    {
        return $this->caseService->getActiveCategories();
    }
}
