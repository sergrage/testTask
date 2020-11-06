<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Article;


class ArticleService {

	public function addLike(Request $request)
	{
		$id = $request['articleId'];
    	$article = Article::findOrFail($id);
    	$article->increment('likes');

    	return $article->likes;
	}

	public function viewsInc(Request $request)
	{
		$id = $request['articleId'];
    	$article = Article::findOrFail($id);
    	$article->increment('views');

    	return $article->views;
	}




}