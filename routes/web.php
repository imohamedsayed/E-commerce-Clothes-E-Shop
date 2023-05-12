<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductControoler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/*
 *
 *   Home
 *
*/

Route::controller(HomeController::class)->group(function (){
    Route::get('/','index')->name('home');
});

/*
 *
 *   Categories
 *
*/

Route::controller(CategoryController::class)->group(function(){
    Route::post('category/insert','insert')->name('category.insert');
    Route::put('category/update/{id}','update')->name('category.update');
    Route::get('category/delete/{id}','delete')->name('category.delete');
    Route::get('category/deleteAll','deleteAll')->name('deleteAllCategories');

    // pages
    Route::get('category/{id}','showById');
    Route::get('dashboard/add_category','addCategory')->name('addCategory');
    Route::get('dashboard/edit_category/{id}','updateCategory')->name('updateCategory');
    Route::get('dashboard/categories','index')->name('allCategories');

});

/*
 *
 *   Products
 *
*/

Route::controller(ProductControoler::class)->group(function(){
    Route::post('product/insert','insert')->name('product.insert');
    Route::put('product/update/{id}','update')->name('product.update');
    Route::get('product/delete/{id}','delete')->name('product.delete');
    Route::get('product/deleteAll','deleteAll')->name('deleteAllProducts');
    Route::get('/dashboard/add_product','addProduct')->name('addProduct');
    Route::get('/dashboard/edit_product/{id}','showEdit')->name('editProduct');
    Route::get('/dashboard/products','index')->name('allProducts');
});

/*
 *
 *   Supplier
 *
*/


Route::controller(\App\Http\Controllers\SupplierController::class)->group(function (){
    //Actions
    Route::post('/supplier/create','create')->name('supplier.create');
    Route::post('/supplier/update/{id}','update')->name('supplier.update');
    Route::get('/supplier/delete/{id}','delete')->name('supplier.delete');
    Route::get('/supplier/deleteAll','deleteAll')->name('supplier.deleteAll');

    // Pages
    Route::get('dashboard/suppliers','index')->name('allSuppliers');
    Route::get('dashboard/add_supplier','add_supplier')->name('addSupplier');
    Route::get('dashboard/edit_supplier/{id}','edit_supplier')->name('editSupplier');
});







Route::controller(\App\Http\Controllers\RegisterController::class)->group(function(){
    Route::get('/signup','index')->name('signup');
    Route::post('/register','register')->name('createUser');
});


Route::controller(LoginController::class)->group(function(){
    Route::get('/login','index')->name('login');
    Route::post('/loginMe','login')->name('loginUser');
});

// Search

Route::controller(\App\Http\Controllers\SearchController::class)->group(function (){
    Route::post('/search','index')->name('search');
});



// Authentication

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',function (){
        if(auth()->user()->role=='admin')
        {
            $productNo = DB::table('products')->count('*');
            $categoryNo = DB::table('categories')->count('*');
            $supplierNo = DB::table('suppliers')->count('*');
            $userNo = DB::table('users')->count('*');

            return view('dashboard.main',compact('productNo','categoryNo','supplierNo','userNo'));
        }else{
            return  redirect()->route('home');
        }
    })->name('dashboard');

    Route::get('/logout',[LoginController::class,'logout'])->name('logoutUser');

});
