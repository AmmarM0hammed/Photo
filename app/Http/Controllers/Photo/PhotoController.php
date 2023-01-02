<?php

namespace App\Http\Controllers\Photo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    // ============ index ============
    public function index(){
        return view('app.Photo.create');
    }

    // ============= Create ===========

    public function store(Request $request){
        $val = $request->validate([
            "tag"=>"required|max:255",
            "image"=>"required|image|mimes:png,jpg,jpeg|max:500000",
       ]);
       
       $directory = public_path()."/"."images/".auth()->user()->username;
       if(!File::exists($directory))
           File::makeDirectory($directory,0777,true);
       $file = $request->file('image');
       $nameImage = $file->store( 'images/'.auth()->user()->username, ['disk' => 'imagePath']);

       Photo::create([
            'user_id'=> auth()->user()->id,
            'tag'=> $request->tag,
            'image'=> $nameImage,
            'key'=> Str::ulid(),
        ])->save();
    }

    public function show($id){
        $data = Photo::where('id',"=" ,$id)->firstOrFail();

        if($data->state == 0 && $data->user_id == auth()->user()->id)
        return view('app.Photo.show',compact('data'));

        else if($data->state == 0)
            return redirect()->route('home');
        else
            return view('app.Photo.show',compact('data'));


    }

    public function download($key){
        $data = Photo::where('key',"=" ,$key)->firstOrFail();
        return response()->download($data->image);

    }



}
