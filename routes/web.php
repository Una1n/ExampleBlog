<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('tag', TagController::class)->except('show');
    Route::resource('article', ArticleController::class)->except(['index', 'show']);
});

// Public Routes
Route::controller(ArticleController::class)->as('article.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/article/{article}', 'show')->name('show');
});

Route::get('/category/{category}/articles', [CategoryController::class, 'show'])->name('category.show');
Route::get('/tag/{tag}/articles', [TagController::class, 'show'])->name('tag.show');

Route::view('/about', 'about')->name('about');

require __DIR__ . '/auth.php';
