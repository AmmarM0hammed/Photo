<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index($username){
        $data = User::where('username',$username)->firstOrFail();
        return view('app.Profile.profile',compact('data'));
    }
    public function edit(){
        return view('app.Profile.edit');
    }
}
