<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $trending = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');
        $categories = DB::table('categories')->get();
        $products = DB::select("SELECT products.*,categories.name, suppliers.name as sname  FROM `products`join categories on products.category_id = categories.id join suppliers on products.supplier_id = suppliers.id where products.title like '%$request->pName%' and categories.name like '%$request->pCat%' and suppliers.name like '%$request->pSup%'");


        return view('search',compact('trending','categories','products'));
    }
}
