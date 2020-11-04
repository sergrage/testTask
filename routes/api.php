<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Use App\Models\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles/{id}/likesInc', function ($id) {
	$article = Article::find($id);
	$article->increment('likes');
    return response()->json(['likes' => $article->likes, 'state' => 200]);
});

Route::get('/articles/{id}/viewsInc', function ($id) {
	$article = Article::find($id);
	$article->increment('views');
    return response()->json(['views' => $article->views, 'state' => 200]);
});

Route::post('/comments/store', [App\Http\Controllers\Api\CommentController::class, 'store']);