<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redis;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');

Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');

Route::post('/articles/newComment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');


Route::post('/articles/addLike', [App\Http\Controllers\ArticleController::class, 'addLike'])->name('articles.addLike');

Route::post('/articles/viewsIncrement', [App\Http\Controllers\ArticleController::class, 'viewsIncrement'])->name('articles.viewsIncrement');

