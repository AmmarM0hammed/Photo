<?php

namespace App\Http\Controllers\Photo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;
class HomeController extends Controller
{
    public function index(){
        $data = Photo::where('state',1)->get();
        return view('app.home',compact('data'));
    }
}
