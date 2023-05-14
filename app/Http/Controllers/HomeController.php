<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if(!is_array(session()->get('cart'))){
            session()->put('cart',[]);
        }

        $categories = DB::table('categories')->get();
        $newArrival = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by products.created_at desc  limit 5');
        $trending = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');
        $topRated = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by rate desc  limit 5');
        $products = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id');
        return view('home',compact('categories','products','newArrival','trending','topRated'));
    }
}
