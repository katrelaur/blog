<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PublicController::class, 'home'])->name('index');
Route::get('/user/{user}', [PublicController::class, 'user'])->name('user');
Route::get('/article/{article}', [PublicController::class, 'article'])->name('article');
Route::post('/article/{article}', [PublicController::class, 'comment'])->name('comment')->middleware('auth');
Route::get('/about', [PublicController::class, 'about'])->name('about');

// Route::get('/admin/articles', [ArticleController::class, 'index'])->name('articles.index');
// Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('articles.create');
// Route::post('/admin/articles', [ArticleController::class, 'store'])->name('articles.store');
// Route::get('/admin/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
// Route::put('/admin/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
// Route::delete('/admin/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('/articles/{slug}', 'ArticleController@show')->name('articles.show');

Route::resource('admin/articles', ArticleController::class);

Route::get('/admin/articles/deleted', [ArticleController::class, 'deleted'])->name('articles.deleted');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
