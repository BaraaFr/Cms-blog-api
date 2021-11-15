<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('id','DESC')->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'thumbnail'=>'required',
            'name'=>'required|unique:categories',
            'is_published'=>"required"
        ],[
            'thumbnail.required'=>'Enter Thumbnail url',
            'name.required'=>'Enter a Category name',
            'name.unique'=>'Category already Exist',
            'is_published.required'=>'Category should be Publish or Draft '
           ]);

        $category=new Category;
        $category->thumbnail=$request->thumbnail;
        $category->user_id=Auth::id();
        $category->name=$request->name;
        $category->is_published=$request->is_published;
        $category->save();

        Session::flash("success",'Category Created Successfully');
        return redirect()->route('categories.index');
    }
    
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request,Category $category)
    {
                $this->validate($request,
        [
            'thumbnail'=>'required',
            'name'=>'required|unique:categories',
            'is_published'=>"required"
        ],[
            'thumbnail.required'=>'Enter Thumbnail url',
            'name.required'=>'Enter a Category name',
            'name.unique'=>'Category already Exist',
            'is_published.required'=>'Category should be Publish or Draft '
           ]);

           $category->thumbnail     =$request->thumbnail;
           $category->user_id       =Auth::id();
           $category->name          =$request->name;
           $category->is_published  =$request->is_published;
           $category->save();
   
           Session::flash("success",'Category Updated Successfully');
           return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash("delete","Category deleted successfully!");
        return redirect()->route('categories.index');
    }
}
