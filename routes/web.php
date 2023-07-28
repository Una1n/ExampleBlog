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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ArticleController::class)->as('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/article/{article}', 'show')->name('show');
});

Route::middleware('auth')->group(function () {
    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('tag', TagController::class)->except('show');
});

Route::get('category/{category}/articles', [CategoryController::class, 'show'])->name('category.show');
Route::get('tag/{tag}/articles', [TagController::class, 'show'])->name('tag.show');

require __DIR__ . '/auth.php';
