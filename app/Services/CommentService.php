<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentService {


	public function addComment(Request $request)
	{
		$comment = Comment::create([
            'title'  =>  $request['commentTitle'],
            'body' =>  $request['commentBody'],
            'article_id' => $request['articleId']
        ]);
	}
}