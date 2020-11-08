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
		$articles = $this->service->getAll();
		return view('app.articles.index', compact('articles'));
	}

    public function show($slug)
    {
    	$article = $this->service->getOneBySlug($slug);
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
