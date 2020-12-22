<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('users', UserController::class)->middleware(['auth','role:admin']);
Route::resource('profiles', ProfileController::class);
Route::get('/', [UserController::class, 'index'],function () {
   
    $value = session('id');});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('tags',TagController::class)->middleware(['auth','role:admin']);
Route::resource('categories',CategoriesController::class)->middleware(['auth','role:admin']);
Route::resource('articles',ArticleController::class)->middleware(['auth','role:admin']);


Route::get('/users/{user}/articles',[ArticleController::class, 'indexShopArticle'])->name('articles.indexShopArticle')->middleware(['auth','role:admin']);;

Route::get('/users/{user}/Articles/{Article}',[ArticleController::class, 'showTag'])->name('articles.showTag');
Route::delete('/articles/{article}/tags/{tag}/delete',[ArticleController::class, 'destroyArticleTag'])->name('articletag.destroy')->middleware(['auth','role:admin']);;

Route::post('/search',[ArticleController::class, 'search'])->name('articles.search');

Route::post('/articles/{article}/updateState',[ArticleController::class, 'updateState'])->name('articles.updateState')->middleware(['auth','role:admin']);;

Route::post('/fillter',[ArticleController::class, 'fillter'])->name('articles.fillter');

