<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MarginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
# Clear all for debugging
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cache cleared";
});

Route::controller(AnswerController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/answer', 'update');
    Route::post('/add-answer', 'store');
    Route::post('/delete-answer', 'destroy');
});

Route::controller(QuestionController::class)->group(function () {
    Route::post('/question', 'update');
    Route::post('/add-question', 'store');
    Route::post('/delete-question', 'destroy');
});

Route::controller(MarginController::class)->group(function () {
    Route::post('/update-margin-top', 'updateTop');
    Route::post('/update-margin-bottom', 'updateBottom');
});
