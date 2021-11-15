<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Mail\VisitorContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class WebController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('id','ASC')->paginate(5);
        $categories=Category::orderBy('id','ASC')->get();
            return view('website.index',compact('posts','categories'));
    }
    public function post($slug)
    {
        $post=Post::where('slug',$slug)->get();
            return view('website.post',compact('post'));
        
    }
    public function category($id)
    {
        $category=Category::where('id',$id)->first();
        $posts=$category->post()->orderBy('posts.id','ASC')->paginate(5);
            return view('website.category',compact('category','posts'));
    }
    public function page($slug)
    {
        $pages=Post::where('slug',$slug)->get();
        return view('website.page',compact('pages'));
    }
    public function showContactForm()
    {
        return view('website.contact');
    }
    public function contact(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required|min:15',
            'reason'=>'required|max:55'
        ]);
        $data=
        [
            'name'=>$request->name,
            'email'=>$request->email,
            'tel'=>$request->tel,
            'reason'=>$request->reason,
            'message'=>$request->message
        ];
        Mail::to('baraafr08@gmail.com')->send(new VisitorContact($data));
        Session::flash('message','Thank you for your message!');
        return back();

    }
}
