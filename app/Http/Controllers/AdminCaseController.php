<?php

namespace App\Http\Controllers;

use App\Models\ProjectCase;
use App\Models\IndustryCategory;
use App\Http\Requests\StoreProjectCaseRequest;
use App\Http\Requests\UpdateProjectCaseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases = ProjectCase::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $case = new ProjectCase();
        $industries = IndustryCategory::active()->ordered()->pluck('name', 'slug')->toArray();

        return view('admin.cases.create', compact('case', 'industries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectCaseRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id() ?? 1; // Временно используем ID 1, если нет авторизации

        // Обработка метрик до/после
        $beforeAfter = [];
        for ($i = 1; $i <= 4; $i++) {
            $metricName = $request->input("metric_name_{$i}");
            $metricBefore = $request->input("metric_before_{$i}");
            $metricAfter = $request->input("metric_after_{$i}");

            if (!empty($metricName) && (!empty($metricBefore) || !empty($metricAfter))) {
                $beforeAfter[$metricName] = [
                    'before' => $metricBefore ?? '',
                    'after' => $metricAfter ?? ''
                ];
            }
        }

        $data['before_after'] = $beforeAfter;

        ProjectCase::create($data);

        Session::flash('success', 'Кейс успешно создан!');
        return redirect()->route('admin.cases.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectCase $case)
    {
        $case->load('user');
        return view('admin.cases.show', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCase $case)
    {
        $industries = IndustryCategory::active()->ordered()->pluck('name', 'slug')->toArray();

        return view('admin.cases.edit', compact('case', 'industries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectCaseRequest $request, ProjectCase $case)
    {
        $data = $request->validated();

        // Обработка метрик до/после
        $beforeAfter = [];
        for ($i = 1; $i <= 4; $i++) {
            $metricName = $request->input("metric_name_{$i}");
            $metricBefore = $request->input("metric_before_{$i}");
            $metricAfter = $request->input("metric_after_{$i}");

            if (!empty($metricName) && (!empty($metricBefore) || !empty($metricAfter))) {
                $beforeAfter[$metricName] = [
                    'before' => $metricBefore ?? '',
                    'after' => $metricAfter ?? ''
                ];
            }
        }

        $data['before_after'] = $beforeAfter;

        $case->update($data);

        Session::flash('success', 'Кейс успешно обновлен!');
        return redirect()->route('admin.cases.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectCase $case)
    {
        $case->delete();

        Session::flash('success', 'Кейс успешно удален!');
        return redirect()->route('admin.cases.index');
    }
}
