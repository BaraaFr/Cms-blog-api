<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts= Post::all();
        $data=PostResource::collection($posts);
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'details'=>'required',
            'post_type'=>'required',
            'is_published'=>'required',
            'category_id'=>'required',

        ]);
        $post= Post::create([
            'user_id'=>2,
            'title'=>$request->title,
            'slug'=>str_slug($request->title).rand(1000,10000),
            'details'=>$request->details,
            'post_type'=>$request->post_type,
            'is_published'=>$request->is_published,
            'category_id'=>$request->category_id,
        ]);
        $data=PostResource::make($post);
        return response()->json($data,201);
    }
    public function show(Post $post)
     {
         $data=PostResource::make($post);
        return response()->json($data,200);
    }
    public function update(Request $request,Post $post)
    {
        $post->update($request->all());
        $data=PostResource::make($post);
        return response()->json($data,200);
    }
    public function destroy(Post $post){
        $post->delete();
        return response()->json(null,204);
    }
    public function search($title){
        $post=Post::where('title','like','%'.$title.'%')->get();
        return $post;
    }
}


