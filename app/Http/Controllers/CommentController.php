<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CommentRequest;
use Validator;

use App\Models\Article;
use App\Models\Comment;

use App\Services\CommentService;

class CommentController extends Controller
{
    private $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'commentTitle' => 'required | min:6',
           'commentBody' => 'required | min:10',
        ]);

        if ($validator->passes()) {

            $this->service->addComment($request);

            return "<div class='alert alert-success' role='alert'>
                  Комментарий успешно отправлен!
                </div>";
            
        }

        return response()->json(['error'=>$validator->errors()]);

        
    }

    // public function store(CommentRequest $request)
    // {
    //     try {



    //     } catch(ValidationException $e) {
    //         return response()->json(['error'=>$validator->errors()]);
    //     }
    // }
}
