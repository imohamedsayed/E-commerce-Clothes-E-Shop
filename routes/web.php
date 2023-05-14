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
    Route::post('category/insert','insert')->middleware(['auth'])->name('category.insert');
    Route::put('category/update/{id}','update')->middleware(['auth'])->name('category.update');
    Route::get('category/delete/{id}','delete')->middleware(['auth'])->name('category.delete');
    Route::get('category/deleteAll','deleteAll')->middleware(['auth'])->name('deleteAllCategories');

    // pages
    Route::get('category/{id}','showById');
    Route::get('dashboard/add_category','addCategory')->middleware(['auth'])->name('addCategory');
    Route::get('dashboard/edit_category/{id}','updateCategory')->middleware(['auth'])->name('updateCategory');
    Route::get('dashboard/categories','index')->middleware(['auth'])->name('allCategories');

});

/*
 *
 *   Products
 *
*/

Route::controller(ProductControoler::class)->group(function(){
    Route::post('product/insert','insert')->middleware(['auth'])->name('product.insert');
    Route::put('product/update/{id}','update')->middleware(['auth'])->name('product.update');
    Route::get('product/delete/{id}','delete')->middleware(['auth'])->name('product.delete');
    Route::get('product/deleteAll','deleteAll')->middleware(['auth'])->name('deleteAllProducts');
    Route::get('/dashboard/add_product','addProduct')->middleware(['auth'])->name('addProduct');
    Route::get('/dashboard/edit_product/{id}','showEdit')->middleware(['auth'])->name('editProduct');
    Route::get('/dashboard/products','index')->middleware(['auth'])->name('allProducts');
});

/*
 *
 *   Supplier
 *
*/


Route::controller(\App\Http\Controllers\SupplierController::class)->group(function (){
    //Actions
    Route::post('/supplier/create','create')->middleware(['auth'])->name('supplier.create');
    Route::post('/supplier/update/{id}','update')->middleware(['auth'])->name('supplier.update');
    Route::get('/supplier/delete/{id}','delete')->middleware(['auth'])->name('supplier.delete');
    Route::get('/supplier/deleteAll','deleteAll')->middleware(['auth'])->name('supplier.deleteAll');

    // Pages
    Route::get('dashboard/suppliers','index')->middleware(['auth'])->name('allSuppliers');
    Route::get('dashboard/add_supplier','add_supplier')->middleware(['auth'])->name('addSupplier');
    Route::get('dashboard/edit_supplier/{id}','edit_supplier')->middleware(['auth'])->name('editSupplier');
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



// Cart

route::controller(\App\Http\Controllers\CartController::class)->group(function(){
    route::get("/cart",'index')->name('cart');
    route::get('/cart/{id}','addToCart')->name('addCart');
    route::get('/delCart/{id}','delFromCart')->name('removeFromCart');
    route::post('/update_cart','updateCart')->name('updateCart');
});


// Confirm Order


route::controller(\App\Http\Controllers\PurchaseController::class)->group(function (){
    route::get("/confirm_order",'customerInfoPage')->name('completeOrder');
    route::post('/buy','completePurchase')->middleware(['auth'])->name('buy');
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
