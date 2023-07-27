<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //
});

Route::controller(ArticleController::class)->as('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/article/{article}', 'show')->name('show');
});

Route::controller(CategoryController::class)->as('category.')->group(function () {
    Route::get('category/{category}/articles', 'show')->name('show');
});

require __DIR__ . '/auth.php';
