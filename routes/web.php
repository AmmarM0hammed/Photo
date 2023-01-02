<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Photo\HomeController ;
use App\Http\Controllers\Photo\PhotoController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    if(auth()->check())
       return redirect()->route('home');
    return view('app.landing');
});
Route::middleware(['auth'])->group(function () {

    //============ Home ============
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //============ Create ============
    Route::get('/create', [PhotoController::class, 'index'])->name('photo.create');
    Route::post('/create', [PhotoController::class, 'store'])->name('photo.create.post');

    //============ Showing ============
    Route::get("/photo/{id}", [PhotoController::class, 'show'])->name('photo.show');
    Route::get("/download/{key}", [PhotoController::class, 'download'])->name('photo.download');

    //============ Profile ============
    Route::get("/@{username}", [UserController::class, 'index'])->name('profile.index');
    Route::prefix('profile')->get("/edit", [UserController::class, 'edit'])->name('profile.edit');



});
