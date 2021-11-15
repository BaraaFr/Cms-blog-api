<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('id','DESC')->where('post_type','post')->where('is_published','1')->get();
        return view('admin.post.index',compact('posts'));
    }

    public function create(request $request,Category $category)
    {
        $categories=Category::all();
        $cat=Category::where("id",$request->category_id)->first();
        return view('admin.post.create',compact('categories','category','cat'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'thumbnail'=>'required',
            'title'=>"required|max:70",
            'details'=>"required",
            'is_published'=>"required",
            'category_id'=>'required'
            
        ],[
            'thumbnail.required'=>'Enter Thumbnail url',
            'title.required'=>'Enter Title',
            'details.required'=>'Enter Post Content',
            'is_published.required'=>'Post will be published or not',
            'category_id.required'=>'Enter a Post Category',
        ]);
        $post               =   new Post;
        $post->thumbnail   =   $request->thumbnail;
        $post->title        =   $request->title;
        $post->user_id      =   Auth::id();
        $post->slug         =   str_slug($request->title).(rand(1,1000));
        $post->details      =   $request->details;
        $post->is_published =   $request->is_published;
        $post->post_type    =   $request->post_type;
        $post->category_id  =   $request->category_id;
        $post->save();

        Session::flash('success','Post Created Successfully');
        if($request->post_type=='page'){
            return redirect()->route('pages.index');
        }else{
            return redirect()->route('posts.index');

        }
        
    }

    public function edit(Post $post)
    {   $categories=Category::all();
        return view('admin.post.edit',compact('post','categories'));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title'=>"required|max:70",
            'details'=>"required",
            'is_published'=>"required",
            'category_id'=>'required'
        ],[
            'thumbnail.required'=>'Enter Thumbnail url',
            'title.required'=>'Enter Title',
            'details.required'=>'Enter Post Content',
            'is_published.required'=>'Post will be published or not',
            'category_id.required'=>'Enter a Post Category',
        ]);
        $post->title        =$request->title;
        $post->user_id      =Auth::id();
        $post->slug         =str_slug($request->title);
        $post->details      =$request->details;
        $post->is_published =$request->is_published;
        $post->post_type    =$request->post_type;
        $post->category_id  =$request->category_id;
        $post->save();

        Session::flash('success','Post Updated Successfully');
        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('delete','Post Deleted Successfully');
        return redirect()->route('posts.index');
    }
}
