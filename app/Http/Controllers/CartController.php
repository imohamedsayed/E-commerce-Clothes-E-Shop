<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class CartController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $trending = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');



        $items = [];
        if(count(session()->get('cart')) > 0){
            foreach (session()->get('cart') as $id=>$qty){
                $product = Product::find($id);
                $product['qty'] = $qty;
                array_push($items,$product);
            }
        }
        return view('cart.cart',compact('categories','trending','items'));
    }

    public function addToCart($id){
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id] += 1;
        }else{
            $cart[$id] =1;
        }
        session()->put('cart',$cart);
        return redirect()->back();
    }

    public function delFromCart($id){
        $cart = session()->get('cart');

        unset($cart[$id]);

        session()->put('cart',$cart);

        return redirect()->back();

    }

    public function updateCart(Request $request){
        $new = $request->all();

        $cart = session()->get('cart');

        foreach ($new as $key => $value){
            if($key != '_token'){
                $cart[$key] = $value;
            }
        }
        session()->put('cart',$cart);




        return redirect()->route('completeOrder');



    }
}
