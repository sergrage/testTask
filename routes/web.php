<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');

Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');

Route::post('/articles/newComment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');


Route::post('/articles/addLike', [App\Http\Controllers\ArticleController::class, 'addLike'])->name('articles.addLike');

Route::post('/articles/viewsIncrement', [App\Http\Controllers\ArticleController::class, 'viewsIncrement'])->name('articles.viewsIncrement');


// Route::post('/articles/newComment', [App\Http\Controllers\CommentController::class, 'newComment'])->name('comment.comment');