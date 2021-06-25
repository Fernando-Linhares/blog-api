<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends BaseController
{
    public function __construct(private Comment $comments){}

    public function comments()
    {
        return response()->json($this->comments->all());
    }

    public function sendComments(Request $request)
    {
        if($this->comments->create($request->all()))
            return response()->json(['message'=>'comment sended with sucess']);
        else
            return response()->json(['message'=>'error on send comment']);
    }
}
