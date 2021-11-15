<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('id','DESC')->limit(3)->get();
        $posts=Post::orderBy('id','DESC')->where('post_type','post')->limit(3)->get();
        $pages=Post::orderBy('id','DESC')->where('post_type','page')->limit(3)->get();
        return view('admin.index',compact('posts','categories','pages'));
    }
}
