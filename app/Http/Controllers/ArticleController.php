<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

use App\Services\ArticleService;

class ArticleController extends Controller
{
    private $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

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
    	$likes = $this->service->addLike($request);

    	return "<i class='far fa-thumbs-up'></i> " . $likes;
    }

    public function viewsIncrement(Request $request)
    {
    	$views = $this->service->viewsInc($request);

    	return "<i class='fas fa-eye'></i> " . $views;
    }

    
}
