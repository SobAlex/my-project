<?php

namespace App\Http\Controllers;

use App\Models\ProjectCase;
use App\Models\IndustryCategory;
use Illuminate\Http\Request;

class CaseController extends Controller
{

    /**
     * Главная страница кейсов
     */
    public function index()
    {
        $casesData = $this->getAllCasesData();
        $title = 'Кейсы SEO продвижения';
        $selectedTag = null;
        $activeCategories = $this->getActiveCategories();

        return view('cases.index', compact('casesData', 'title', 'selectedTag', 'activeCategories'));
    }

    /**
     * Кейсы по одежде
     */
    public function clothing()
    {
        return $this->filterByTag('clothing', 'Кейсы SEO продвижения: Одежда');
    }

    /**
     * Кейсы по производству
     */
    public function production()
    {
        return $this->filterByTag('production', 'Кейсы SEO продвижения: Производство');
    }

    /**
     * Кейсы по электронике
     */
    public function electronics()
    {
        return $this->filterByTag('electronics', 'Кейсы SEO продвижения: Электроника');
    }

    /**
     * Кейсы по мебели
     */
    public function furniture()
    {
        return $this->filterByTag('furniture', 'Кейсы SEO продвижения: Мебель');
    }

    /**
     * Универсальный метод для всех категорий отраслей
     */
    public function category($industry)
    {
        // Проверяем, существует ли категория в базе данных
        $category = IndustryCategory::where('slug', $industry)->first();

        if (!$category) {
            abort(404, 'Категория не найдена');
        }

        $title = 'Кейсы SEO продвижения: ' . $category->name;
        return $this->filterByTag($industry, $title);
    }

    /**
     * Фильтрация кейсов по тегу
     */
    private function filterByTag($tag, $title)
    {
        $allCasesData = $this->getAllCasesData();
        $casesData = [];

        foreach ($allCasesData as $serviceKey => $serviceData) {
            $filteredCases = array_filter($serviceData['cases'], function ($case) use ($tag) {
                return $case['industry'] === $tag;
            });

            if (!empty($filteredCases)) {
                $casesData[$serviceKey] = $serviceData;
                $casesData[$serviceKey]['cases'] = array_values($filteredCases);
            }
        }

        $selectedTag = $tag;
        $categoryInfo = $this->getCategoryInfo($tag);
        $activeCategories = $this->getActiveCategories();

        return view('cases.index', compact('casesData', 'title', 'selectedTag', 'categoryInfo', 'activeCategories'));
    }

    /**
     * Страница отдельного кейса
     */
    public function show($id)
    {
        // Ищем кейс по case_id в базе данных
        $case = ProjectCase::where('case_id', $id)
            ->published()
            ->first();

        if (!$case) {
            abort(404);
        }

        // Преобразуем кейс в формат шаблона
        $case = $this->transformCaseForTemplate($case);

        // Определяем категорию по industry
        $categoryInfo = $this->getCategoryInfo($case['industry']);

        // Создаем serviceData для совместимости с шаблоном
        $serviceData = [
            'service_name' => 'SEO продвижение',
            'service_icon' => 'trending_up'
        ];

        return view('cases.show', compact('case', 'serviceData', 'categoryInfo'));
    }

    /**
     * Получить активные категории отраслей
     */
    private function getActiveCategories()
    {
        return IndustryCategory::active()
            ->ordered()
            ->get()
            ->map(function ($category) {
                return [
                    'slug' => $category->slug,
                    'name' => $category->name,
                    'route' => 'cases.category',
                    'route_params' => [$category->slug],
                    'is_legacy' => false
                ];
            })
            ->toArray();
    }

    /**
     * Получить информацию о категории по industry
     */
    private function getCategoryInfo($industry)
    {
        // Сначала пытаемся получить категорию из базы данных
        $category = IndustryCategory::where('slug', $industry)->first();

        if ($category) {
            return [
                'name' => $category->name,
                'route' => 'cases.category',
                'route_params' => [$category->slug],
                'slug' => $category->slug
            ];
        }

        // Fallback на старые категории для обратной совместимости
        $legacyCategories = [
            'clothing' => [
                'name' => 'Одежда',
                'route' => 'cases.clothing',
                'route_params' => []
            ],
            'production' => [
                'name' => 'Производство',
                'route' => 'cases.production',
                'route_params' => []
            ],
            'electronics' => [
                'name' => 'Электроника',
                'route' => 'cases.electronics',
                'route_params' => []
            ],
            'furniture' => [
                'name' => 'Мебель',
                'route' => 'cases.furniture',
                'route_params' => []
            ]
        ];

        return $legacyCategories[$industry] ?? null;
    }

    /**
     * Получить данные кейсов
     */
    public function getCasesData()
    {
        return $this->getAllCasesData();
    }

    /**
     * Получить последние кейсы по одной из каждой категории для главной страницы
     */
    public function getLatestCasesForHomepage()
    {
        $categories = ['electronics', 'production', 'clothing', 'furniture'];
        $latestCases = [];

        foreach ($categories as $industry) {
            $case = ProjectCase::published()
                ->byIndustry($industry)
                ->ordered()
                ->first();

            if ($case) {
                $latestCases[] = $this->transformCaseForTemplate($case);
            }
        }

        return $latestCases;
    }

    /**
     * Получить все данные кейсов с тегами из базы данных
     */
    public function getAllCasesData()
    {
        // Получаем все опубликованные кейсы из базы данных
        $cases = ProjectCase::published()
            ->ordered()
            ->get();

        // Преобразуем данные в формат, который ожидают шаблоны
        $transformedCases = $cases->map(function ($case) {
            return $this->transformCaseForTemplate($case);
        });

        return [
            'seo-promotion' => [
                'service_name' => 'SEO продвижение',
                'service_icon' => 'trending_up',
                'cases' => $transformedCases->toArray()
            ]
        ];
    }

    /**
     * Преобразовать кейс из БД в формат шаблона
     */
    private function transformCaseForTemplate(ProjectCase $case)
    {
        return [
            'id' => $case->case_id,
            'title' => $case->title,
            'client' => $case->client,
            'industry' => $case->industry,
            'period' => $case->period,
            'image' => $case->image,
            'description' => $case->description,
            'content' => $case->content,
            'results' => $case->results_array, // Используем accessor для получения массива результатов
            'before_after' => $case->before_after,
            'has_valid_category' => $this->hasValidCategory($case->industry)
        ];
    }

    /**
     * Проверить, существует ли активная категория для данной отрасли
     */
    private function hasValidCategory($industry)
    {
        if (empty($industry)) {
            return false;
        }

        return IndustryCategory::where('slug', $industry)->active()->exists();
    }
}
