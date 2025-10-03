<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\IndustryCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MediaLibraryController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\TestMediaController;

// ============================================================================
// PUBLIC ROUTES
// ============================================================================

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static pages
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

// Services pages
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/{service:slug}', [ServiceController::class, 'show'])->name('show');

});

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

// Media Library
Route::get('/admin/media', [MediaLibraryController::class, 'index'])->name('media.library');
Route::get('/demo/media', [DemoController::class, 'index'])->name('demo.media');


// ============================================================================
// ADMIN ROUTES
// ============================================================================

// API routes for categories (outside admin prefix to avoid Filament conflicts)
Route::prefix('api')->name('api.')->middleware(['web'])->group(function () {
    // Blog Categories API
    Route::resource('blog-categories', BlogCategoryController::class);

    // Industry Categories API
    Route::resource('industry-categories', IndustryCategoryController::class);

    // Media Library API (with CSRF protection)
    Route::get('media/stats', [MediaController::class, 'stats'])->name('media.stats');
    Route::resource('media', MediaController::class);
});

// API routes without CSRF protection for testing
Route::prefix('api/test')->name('api.test.')->group(function () {
    Route::post('media/upload', [TestMediaController::class, 'upload'])->name('media.upload');
    Route::get('media/stats', [TestMediaController::class, 'stats'])->name('media.stats');
});
