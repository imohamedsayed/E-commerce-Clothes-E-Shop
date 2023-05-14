<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCreditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function customerInfoPage(){
        $categories = DB::table('categories')->get();
        $trending = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');
        return view('cart.complete_purchase',compact('categories','trending'));
    }

    public function completePurchase(storeCreditRequest $request){


    }
}
