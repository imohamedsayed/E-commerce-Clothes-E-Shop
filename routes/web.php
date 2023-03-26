<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductControoler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('category/{id}',[CategoryController::class,'showById']);

Route::controller(HomeController::class)->group(function (){
    Route::get('/','index')->name('home');
});


Route::resource('category',CategoryController::class);
Route::resource('product',ProductControoler::class);


Route::controller(CategoryController::class)->group(function(){
    Route::post('category/insert','insert')->name('category.insert');

});


Route::controller(ProductControoler::class)->group(function(){
    Route::post('product/insert','insert')->name('product.insert');
});



Route::controller(\App\Http\Controllers\RegisterController::class)->group(function(){
    Route::get('/signup','index')->name('signup');
    Route::post('/register','register')->name('createUser');
});


Route::controller(LoginController::class)->group(function(){
    Route::get('/login','index')->name('login');
    Route::post('/loginMe','login')->name('loginUser');
});



// Authentication

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',function (){
        if(auth()->user()->role=='admin')
        {
            return view('dashboard.main');
        }else{
            return  redirect()->route('home');
        }
    })->name('dashboard');

    Route::get('/logout',[LoginController::class,'logout'])->name('logoutUser');

});

