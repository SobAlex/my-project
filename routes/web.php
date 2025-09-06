<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CaseController;

Route::get('/', function () {
    return view('welcome');
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
Route::get('/cases/{id}', [CaseController::class, 'show'])->name('cases.show');

// Contact forms
Route::post('/contact/hero', [ContactController::class, 'submitHero'])->name('contact.hero');
Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact.submit');
Route::post('/service/order', [ContactController::class, 'submitServiceOrder'])->name('service.order');
