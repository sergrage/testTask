<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Redis;

use App\Services\Repositories\ArticleRepository;

use App\Services\Repositories\ArticleRepositoryInterface;

class ArticleService {

	protected $repository;

	public function __construct(ArticleRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function getAll()
	{
		return $this->repository->getAllArticles();
	}

	public function getOneBySlug($slug)
	{
		return $this->repository->getBySlug($slug);
	}

	public function addLike(Request $request)
	{
		$id = $request['articleId'];
    	$article = $this->repository->getById($id);
    	$article->increment('likes');

    	return $article->likes;
	}

	public function viewsInc(Request $request)
	{
		$id = $request['articleId'];
    	$article = $this->repository->getById($id);
    	$article->increment('views');

    	return $article->views;
	}


}