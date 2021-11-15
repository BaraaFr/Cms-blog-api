<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {   
        $pages=Post::where('post_type','page')->where('is_published','1')->get();
        return view('admin.page.index',compact('pages'));
    }


    public function create()
    {
        $categories=Category::all();
        return view('admin.page.create',compact('categories'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
