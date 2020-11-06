<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
    	$articles = Article::with('tags')->orderBy('created_at', 'desc')->limit(6)->get();
    	return view('app.home', compact('articles'));
    }
}
