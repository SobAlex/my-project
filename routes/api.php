<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestMediaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Media Library API (без CSRF защиты)
Route::prefix('media')->group(function () {
    Route::post('upload', [TestMediaController::class, 'upload']);
    Route::get('stats', [TestMediaController::class, 'stats']);
});
