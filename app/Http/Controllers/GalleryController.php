<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries=Gallery::all();
        return view('admin.gallery.index',compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image_url->extension();  
     
        $request->image_url->move(public_path('gallery'), $imageName);
        $gallery= new Gallery;
        $gallery->image_url=$imageName;
        $gallery->user_id=Auth::id();
        $gallery->save();

        Session::flash('success','Image Successfully uplaoded');
        return redirect()->route('galleries.index');
    }
    public function show($id)
    {
        //
    }

    public function edit(Gallery $gallery)
    {
      //
    }

    public function update(Request $request, Gallery $gallery)
    {
       //
    }

    public function destroy(Gallery $gallery)
    {   
        //to delete image from the public folder
        $path=public_path() . '\gallery\\'.$gallery->image_url;
        unlink($path);

        //delete the info in database
        $gallery->delete();
        Session::flash('delete','Image Deleted Successfully');
        return redirect()->route('galleries.index');
    }
}
