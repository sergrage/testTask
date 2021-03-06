<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\Comment;
use App\Models\Article;

use App\Jobs\ApiComment;

class CommentController extends Controller {

  public function store(Request $request) {
    $validator = Validator::make($request->all(), [
      'subject' => 'required|min:6',
      'body' => 'required|min:10',
      // 'article_id' => 'required|integer',
      ],
    );

    if ($validator->fails()) {
      return response()->json([
       	'status' => 'error',
       	'msg'    => 'Error',
       	'errors' => $validator->errors(),
     	], 422);
    } 

  // При удачной валидации, добавление комментария происходит в очереди.
		
		$title = $request['subject'];        
		$body = $request['body'];
    $article_id = 1;
    // $article_id = $request['article_id'];
    // $article_id = Article::all()->pluck('id')->random();

		// info($title);
    // info($body);
    // info($article_id);

    ApiComment::dispatch($title, $body, $article_id)->delay(now()->addSecond(10));

    return response()->json([
        'status' => 'success',
        'msg'    => 'Okay',
    ], 201);
  }
}
