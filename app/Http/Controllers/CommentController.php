<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CommentRequest;
use Validator;

use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'commentTitle' => 'required | min:6',
           'commentBody' => 'required | min:10',
        ]);

        if ($validator->passes()) {

            $comment = Comment::create([
                'title'  =>  $request['commentTitle'],
                'body' =>  $request['commentBody'],
                'article_id' => $request['commentId']
            ]);

            return "<div class='alert alert-success' role='alert'>
                  Комментарий успешно отправлен!
                </div>";
            
        }

        return response()->json(['error'=>$validator->errors()]);

        
    }
}
