<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductControoler;
use Illuminate\Support\Facades\Route;

Route::get('category/{id}',[CategoryController::class,'showById']);


Route::controller(HomeController::class)->group(function (){
    Route::get('/','index');
});

Route::resource('category',CategoryController::class);
Route::resource('product',ProductControoler::class);


Route::controller(CategoryController::class)->group(function(){
    Route::post('category/insert','insert')->name('category.insert');

});


Route::controller(ProductControoler::class)->group(function(){
    Route::post('product/insert','insert')->name('product.insert');
});
