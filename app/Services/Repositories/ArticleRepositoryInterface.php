<?php

namespace App\Services\Repositories;

interface ArticleRepositoryInterface
{
	public function getAllArticles();

	public function getById(int $id);

	public function getBySlug(string $slug);

}