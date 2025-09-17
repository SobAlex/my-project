<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    $caseController = new \App\Http\Controllers\CaseController();
    $blogController = new \App\Http\Controllers\BlogController();
    $reviewController = new \App\Http\Controllers\ReviewController();

    $latestCases = $caseController->getLatestCasesForHomepage();
    $latestArticles = $blogController->getLatestArticlesForHomepage();
    $randomReviews = $reviewController->getRandomReviewsForHomepage();

    return view('welcome', compact('latestCases', 'latestArticles', 'randomReviews'));
})->name('home');

// Services pages
Route::get('/services/seo-promotion', [ServiceController::class, 'seoPromotion'])->name('services.seo-promotion');
Route::get('/services/technical-audit', [ServiceController::class, 'technicalAudit'])->name('services.technical-audit');
Route::get('/services/content-audit', [ServiceController::class, 'contentAudit'])->name('services.content-audit');
Route::get('/services/behavioral-audit', [ServiceController::class, 'behavioralAudit'])->name('services.behavioral-audit');
Route::get('/services/link-profile', [ServiceController::class, 'linkProfile'])->name('services.link-profile');
Route::get('/services/semantic-core', [ServiceController::class, 'semanticCore'])->name('services.semantic-core');
Route::get('/services/seo-strategy', [ServiceController::class, 'seoStrategy'])->name('services.seo-strategy');

// Pages
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

// Cases
Route::get('/cases', [CaseController::class, 'index'])->name('cases');
Route::get('/cases/clothing', [CaseController::class, 'clothing'])->name('cases.clothing');
Route::get('/cases/production', [CaseController::class, 'production'])->name('cases.production');
Route::get('/cases/electronics', [CaseController::class, 'electronics'])->name('cases.electronics');
Route::get('/cases/furniture', [CaseController::class, 'furniture'])->name('cases.furniture');
Route::get('/cases/{id}', [CaseController::class, 'show'])->name('cases.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/seo-news', [BlogController::class, 'seoNews'])->name('blog.seo-news');
Route::get('/blog/analytics', [BlogController::class, 'analytics'])->name('blog.analytics');
Route::get('/blog/tips', [BlogController::class, 'tips'])->name('blog.tips');
Route::get('/blog/{category}/{slug}', [BlogController::class, 'show'])->name('blog.article');

// Contact forms
Route::post('/contact/hero', [ContactController::class, 'submitHero'])->name('contact.hero');
Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact.submit');
Route::post('/service/order', [ContactController::class, 'submitServiceOrder'])->name('service.order');
