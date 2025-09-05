<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome-new');
});

// Contact forms
Route::post('/contact/hero', [ContactController::class, 'submitHero'])->name('contact.hero');
Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact.submit');
Route::post('/service/order', [ContactController::class, 'submitServiceOrder'])->name('service.order');
