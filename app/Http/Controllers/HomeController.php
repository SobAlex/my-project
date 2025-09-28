<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use App\Models\HeroSection;
use App\Models\WhyUs;
use App\Services\ContactService;
use App\Services\CaseService;
use App\Services\BlogService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private ContactService $contactService,
        private CaseService $caseService,
        private BlogService $blogService
    ) {}

    /**
     * Главная страница сайта
     */
    public function index()
    {
        // Получаем данные от других контроллеров
        $caseController = app(CaseController::class);
        $blogController = app(BlogController::class);
        $reviewController = app(ReviewController::class);

        // Собираем все необходимые данные
        $latestCases = $caseController->getLatestCasesForHomepage();
        $latestArticles = $blogController->getLatestArticlesForHomepage();
        $randomReviews = $reviewController->getRandomReviewsForHomepage();
        $contactInfo = $this->contactService->getContactInfo();
        $homepageFaqs = Faq::visibleOnHomepage()->get();
        $featuredServices = Service::published()->showOnHomepage()->ordered()->take(6)->get();
        $heroSections = HeroSection::active()->ordered()->get();
        $whyUsBlocks = WhyUs::active()->ordered()->get();

        // Получаем категории для навигации
        $activeCategories = $this->caseService->getActiveCategories();
        $activeBlogCategories = $this->blogService->getActiveCategories();

        return view('welcome', compact(
            'latestCases',
            'latestArticles',
            'randomReviews',
            'contactInfo',
            'homepageFaqs',
            'featuredServices',
            'heroSections',
            'whyUsBlocks',
            'activeCategories',
            'activeBlogCategories'
        ));
    }
}
