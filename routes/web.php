<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;

// Homepage
Route::get('/', function () {
    $caseController = app(CaseController::class);
    $blogController = app(BlogController::class);
    $reviewController = app(ReviewController::class);

    $latestCases = $caseController->getLatestCasesForHomepage();
    $latestArticles = $blogController->getLatestArticlesForHomepage();
    $randomReviews = $reviewController->getRandomReviewsForHomepage();

    return view('welcome', compact('latestCases', 'latestArticles', 'randomReviews'));
})->name('home');

// Services pages
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/seo-promotion', [ServiceController::class, 'seoPromotion'])->name('seo-promotion');
    Route::get('/technical-audit', [ServiceController::class, 'technicalAudit'])->name('technical-audit');
    Route::get('/content-audit', [ServiceController::class, 'contentAudit'])->name('content-audit');
    Route::get('/behavioral-audit', [ServiceController::class, 'behavioralAudit'])->name('behavioral-audit');
    Route::get('/link-profile', [ServiceController::class, 'linkProfile'])->name('link-profile');
    Route::get('/semantic-core', [ServiceController::class, 'semanticCore'])->name('semantic-core');
    Route::get('/seo-strategy', [ServiceController::class, 'seoStrategy'])->name('seo-strategy');
});

// Pages
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

// Cases
Route::get('/cases', [CaseController::class, 'index'])->name('cases');
Route::prefix('cases')->name('cases.')->group(function () {
    Route::get('/clothing', [CaseController::class, 'clothing'])->name('clothing');
    Route::get('/production', [CaseController::class, 'production'])->name('production');
    Route::get('/electronics', [CaseController::class, 'electronics'])->name('electronics');
    Route::get('/furniture', [CaseController::class, 'furniture'])->name('furniture');
    Route::get('/category/{industry}', [CaseController::class, 'category'])->name('category');
    Route::get('/{id}', [CaseController::class, 'show'])->name('show');
});

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/seo-news', [BlogController::class, 'seoNews'])->name('seo-news');
    Route::get('/analytics', [BlogController::class, 'analytics'])->name('analytics');
    Route::get('/tips', [BlogController::class, 'tips'])->name('tips');
    Route::get('/category/{category}', [BlogController::class, 'category'])->name('category');
    Route::get('/{category}/{slug}', [BlogController::class, 'show'])->name('article');
    Route::get('/{slug}', [BlogController::class, 'showWithoutCategory'])->name('article.uncategorized');
});

// Contact forms
Route::prefix('contact')->name('contact.')->group(function () {
    Route::post('/hero', [ContactController::class, 'submitHero'])->name('hero');
    Route::post('/', [ContactController::class, 'submitContact'])->name('submit');
});

Route::post('/service/order', [ContactController::class, 'submitServiceOrder'])->name('service.order');
