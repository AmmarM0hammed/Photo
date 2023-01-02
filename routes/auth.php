<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::prefix('auth')->group(function () {
    // -------------- Frontend --------------
    Route::get('/',function(){return back();});
    Route::get('/register',[AuthController::class , 'reigster'])->name('auth.register');
    Route::get('/login',[AuthController::class , 'login'])->name('auth.login');
    Route::get('/logout',[AuthController::class , 'logout'])->name('auth.logout');
    // -------------- Backend --------------
    Route::post('/register',[AuthController::class , 'reigster_post'])->name('auth.register.post');
    Route::post('/login',[AuthController::class , 'login_post'])->name('auth.login.post');

});