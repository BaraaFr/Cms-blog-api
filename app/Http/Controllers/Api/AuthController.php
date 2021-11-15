<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $field=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user=User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => Hash::make($field['password']),
        ]);
        $token=$user->createToken('Myapp')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }

    public function login(Request $request)
    {
        $field=$request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        //Check Email
        $user=User::where('email',$field['email'])->first();
        if(!$user || !Hash::check($field['password'],$user->password)){
            return response([
                'message'=>'Credentials Didn\'t match'
            ],401);
        }else{
        $token=$user->createToken('Myapp')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
} 
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
   
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
        
    }
}
