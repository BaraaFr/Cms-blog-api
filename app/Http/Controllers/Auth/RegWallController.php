<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RegWallController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    public function showwallform()
    {
        return view('admin.register.wall');
    }
    public function wall(Request $request)
    {
        $this->validate($request,[
            'code'=>'required'
        ],[
            'code.required'=>'Please Enter Code before submitting',
        ]);
        $code='admin12@21';
        if($request->code==$code){
            return redirect()->route('register');
        }else{
            Session::flash('delete','Code is Incorrect');
            return back();
        }
    }
}