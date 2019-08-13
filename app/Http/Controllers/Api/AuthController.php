<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function regisetr(Request $request)

    {
        $validateData=$request->validate([
            'name'      =>  'required|max:55',
            'email'     =>  'email|required|unique:users',
            'password'  =>  'required|confirmed',

        ]);
        $validateData['password']  =   bcrypt($request->password);

        $user=User::create($validateData);

        $accessToken              =    $user-> createToken('authToken')->accessToken;
         return response()->json(['user'=>$user,'access_token'=>$accessToken]);
    }
    public function login(Request $request)
    {
        $loginData=$request->validate([
            
            'email'     =>   'email|required',
            'password'  =>   'required',

        ]);
        if(!auth()->attempt($loginData)){
            return response(['message'=>'Invalid User']);           
        }
        $accessToken    =   auth()->user()-> createToken('authToken')->accessToken;
        return response()->json(['message'=>'You are logged in','user'=>auth()->user(),'access_token'=>$accessToken]);
       
    }
    
}
