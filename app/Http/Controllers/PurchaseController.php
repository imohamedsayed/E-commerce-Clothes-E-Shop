<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCreditRequest;
use App\Models\Cart;
use App\Models\Credit;
use App\Models\Order;
use Carbon\Carbon;
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
        $new_cart = Cart::create([
            'userID'=> auth()->user()->id,
        ]);
        $cart = session()->get('cart');

        foreach ($cart as $id=>$qty){
            DB::table('cart_product')->insert([
                'cartID' => $new_cart->id,
                'prodductID'=> $id,
                'quantity'=>$qty,
                'created_at' => Carbon::now(),
            ]);
        }

        $new_order = Order::create([
            'cartID'=>$new_cart->id,
        ]);

        Credit::create([
            'orderID' => $new_order->id,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'card_number'=>$request->credit
        ]);

        session()->put('cart',[]);

        return redirect()->route('orderDone');

    }



    public function doneOrder(){
        $categories = DB::table('categories')->get();
        $trending = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');
        return view('cart.order_done',compact('categories','trending'));
    }
}
