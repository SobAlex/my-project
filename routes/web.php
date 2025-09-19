<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\AdminCaseController;
use App\Http\Controllers\Admin\IndustryCategoryController;
use App\Http\Controllers\AdminImageUploadController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminFaqController;
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
// Универсальный маршрут для всех категорий отраслей (должен быть перед cases/{id})
Route::get('/cases/category/{industry}', [CaseController::class, 'category'])->name('cases.category');
Route::get('/cases/{id}', [CaseController::class, 'show'])->name('cases.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/seo-news', [BlogController::class, 'seoNews'])->name('blog.seo-news');
Route::get('/blog/analytics', [BlogController::class, 'analytics'])->name('blog.analytics');
Route::get('/blog/tips', [BlogController::class, 'tips'])->name('blog.tips');
// Универсальный маршрут для всех категорий блогов
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{category}/{slug}', [BlogController::class, 'show'])->name('blog.article');

// Contact forms
Route::post('/contact/hero', [ContactController::class, 'submitHero'])->name('contact.hero');
Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact.submit');
Route::post('/service/order', [ContactController::class, 'submitServiceOrder'])->name('service.order');

// Admin routes for cases
Route::prefix('admin/cases')->name('admin.cases.')->group(function () {
    Route::get('/', [AdminCaseController::class, 'index'])->name('index');
    Route::get('/create', [AdminCaseController::class, 'create'])->name('create');
    Route::post('/', [AdminCaseController::class, 'store'])->name('store');
    Route::get('/{case}', [AdminCaseController::class, 'show'])->name('show');
    Route::get('/{case}/edit', [AdminCaseController::class, 'edit'])->name('edit');
    Route::put('/{case}', [AdminCaseController::class, 'update'])->name('update');
    Route::delete('/{case}', [AdminCaseController::class, 'destroy'])->name('destroy');
});

// Admin routes for industry categories
Route::prefix('admin/industry-categories')->name('admin.industry-categories.')->group(function () {
    Route::get('/', [IndustryCategoryController::class, 'index'])->name('index');
    Route::get('/create', [IndustryCategoryController::class, 'create'])->name('create');
    Route::post('/', [IndustryCategoryController::class, 'store'])->name('store');
    Route::get('/{industryCategory}', [IndustryCategoryController::class, 'show'])->name('show');
    Route::get('/{industryCategory}/edit', [IndustryCategoryController::class, 'edit'])->name('edit');
    Route::put('/{industryCategory}', [IndustryCategoryController::class, 'update'])->name('update');
    Route::delete('/{industryCategory}', [IndustryCategoryController::class, 'destroy'])->name('destroy');
});

// Admin routes for blogs
Route::prefix('admin/blogs')->name('admin.blogs.')->group(function () {
    Route::get('/', [AdminBlogController::class, 'index'])->name('index');
    Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
    Route::post('/', [AdminBlogController::class, 'store'])->name('store');
    Route::get('/{blog}', [AdminBlogController::class, 'show'])->name('show');
    Route::get('/{blog}/edit', [AdminBlogController::class, 'edit'])->name('edit');
    Route::put('/{blog}', [AdminBlogController::class, 'update'])->name('update');
    Route::delete('/{blog}', [AdminBlogController::class, 'destroy'])->name('destroy');
});

// Admin routes for blog categories
Route::prefix('admin/blog-categories')->name('admin.blog-categories.')->group(function () {
    Route::get('/', [AdminBlogCategoryController::class, 'index'])->name('index');
    Route::get('/create', [AdminBlogCategoryController::class, 'create'])->name('create');
    Route::post('/', [AdminBlogCategoryController::class, 'store'])->name('store');
    Route::get('/{blogCategory}', [AdminBlogCategoryController::class, 'show'])->name('show');
    Route::get('/{blogCategory}/edit', [AdminBlogCategoryController::class, 'edit'])->name('edit');
    Route::put('/{blogCategory}', [AdminBlogCategoryController::class, 'update'])->name('update');
    Route::delete('/{blogCategory}', [AdminBlogCategoryController::class, 'destroy'])->name('destroy');
});

// Admin routes for contact settings
Route::prefix('admin/contacts')->name('admin.contacts.')->group(function () {
    Route::get('/', [AdminContactController::class, 'index'])->name('index');
    Route::get('/edit', [AdminContactController::class, 'edit'])->name('edit');
    Route::put('/', [AdminContactController::class, 'update'])->name('update');
    Route::post('/create-defaults', [AdminContactController::class, 'createDefaults'])->name('create-defaults');
});

// Admin routes for FAQs
Route::prefix('admin/faqs')->name('admin.faqs.')->group(function () {
    Route::get('/', [AdminFaqController::class, 'index'])->name('index');
    Route::get('/create', [AdminFaqController::class, 'create'])->name('create');
    Route::post('/', [AdminFaqController::class, 'store'])->name('store');
    Route::get('/{faq}', [AdminFaqController::class, 'show'])->name('show');
    Route::get('/{faq}/edit', [AdminFaqController::class, 'edit'])->name('edit');
    Route::put('/{faq}', [AdminFaqController::class, 'update'])->name('update');
    Route::delete('/{faq}', [AdminFaqController::class, 'destroy'])->name('destroy');
});

// Admin image upload for TinyMCE file picker
Route::post('/admin/upload-image', [AdminImageUploadController::class, 'uploadImage'])->name('admin.upload-image');
