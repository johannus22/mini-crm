<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view("/register");
    }

    public function registerPost(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with("success","Registered Successfully");
    }

    public function login(Request $request){
        return view('login');
    }

    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password'=> $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect('/home')->with('success', 'Successful Login');
        }
        return back()->with('error','Invalid Username or Password!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
