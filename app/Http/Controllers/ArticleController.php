<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

	public function index()
	{
		$articles = Article::with('tags')->orderBy('created_at', 'desc')->paginate(10);
		return view('app.articles.index',compact('articles'));
	}

    public function show($slug)
    {
    	$article = Article::with('comments')->where('slug', $slug)->firstOrFail();
    	// $article->increment('views');
		// dd($post->comments->isEmpty());
		return view('app.articles.show', compact('article'));
    }

    public function addLike(Request $request)
    {
    	$id = $request['commentId'];
    	$article = Article::find($id);

    	$article->increment('likes');

    	return "<i class='far fa-thumbs-up'></i> " . $article->likes;
    }

    public function viewsIncrement(Request $request)
    {
    	$id = $request['commentId'];
    	$article = Article::find($id);

    	$article->increment('views');

    	return "<i class='fas fa-eye'></i> " . $article->views;
    }

    
}
