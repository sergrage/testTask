<?php

namespace App\Services\Repositories;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Redis;

class ArticleRepository implements ArticleRepositoryInterface {

	protected $article;

	public function __construct(Article $article)
	{
		$this->article = $article;
	}

	public function getAllArticles()
	{
		return $this->article->with('tags')->orderBy('created_at', 'desc')->paginate(10);
	}

	public function getById($id) {
		return $this->article->findOrFail($id);
	}

	public function getBySlug($slug)
	{
		return $this->article->with('comments')->where('slug', $slug)->firstOrFail();
	}

}