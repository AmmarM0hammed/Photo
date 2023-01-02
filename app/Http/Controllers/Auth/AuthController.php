<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    //=============View============
    public function reigster(){
        if(auth()->check())
         return redirect('/home');
        return view('auth.register');
    }
    public function login(){
        if(auth()->check())
         return redirect('/home');
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
    //=============Backend============
    public function reigster_post(Request $request){
        $validated = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|unique:users|max:255|alpha_num',
            'email' => 'required|unique:users|max:255|email',
            'password'=> "required|same:retypepassword|max:255|min:8",
            'retypepassword'=> "required|max:255",
        ]);
    
        User::create([
            'name'=> $request->fullname,
            'username'=> $request->username,
            'email'=> $request->email,
            'phone'=>0,
            'password'=> Hash::make($request->password),
        ])->save();
        
        return redirect()->route('auth.login');
    }

    public function login_post(Request $request){
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($data))
            return redirect()->route("home");

        return back()->with("error" , "Wrong E-mail or Password");
    }
        
}
