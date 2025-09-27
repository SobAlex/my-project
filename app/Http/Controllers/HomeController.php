<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Services\ContactService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private ContactService $contactService
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

        return view('welcome', compact(
            'latestCases',
            'latestArticles',
            'randomReviews',
            'contactInfo',
            'homepageFaqs'
        ));
    }
}
