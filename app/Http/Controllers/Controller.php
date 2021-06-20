<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Post;

class Controller extends BaseController
{
    public function __construct(private Post $posts){}

    public function index()
    {
        return response()->json($this->posts->all());
    }

    public function select($id)
    {
        $post = $this->posts->findOrFail($id);
        return response()->json($post);
    }

    public function create(Request $request)
    {
        if($this->posts->create($request->all()))
            return response()->json(['message'=>'created sucessfuly']);
        
        return response()->json(['message'=>'error on create post']);
    }

    public function destroy(Request $request,$id)
    {
        if($this->posts->destroy($id))
            return response()->json(['message'=>'deleted sucessfuly']);
        
        return response()->json(['message'=>'error on delete post']);
    }

    public function update(Request $request,$id)
    {
        $post = $this->posts->findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $request->image;
        
        if($post->save())
            return response()->json(['message'=>'updated sucessfuly']);
        
        return response()->json(['message'=>'error on update post']);
    }

    public function updateImage(Request $request,$id)
    {
        $post = $this->posts->findOrFail($id);
        $post->image = $request->image;
        if($post->save())
            return response()->json(['message'=>'updated sucessfuly']);
        
        return response()->json(['message'=>'error on update post']);
    }

    public function updateContent(Request $request,$id)
    {
        $post = $this->posts->findOrFail($id);
        $post->content = $request->text;
        
        if($post->save())
            return response()->json(['message'=>'updated sucessfuly']);
        
        return response()->json(['message'=>'error on update post']);
    }

    public function updateTitle(Request $request,$id)
    {
        $post = $this->posts->findOrFail($id);
        $post->title = $request->title;
        
        if($post->save())
            return response()->json(['message'=>'updated sucessfuly']);
        
        return response()->json(['message'=>'error on update post']);
    }
}
