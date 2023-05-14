<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public  function  index(){
        if(!is_array(session()->get('cart'))){
            session()->put('cart',[]);
        }
        $categories = DB::table('categories')->get();
        $trending = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');

        return view('auth.login',compact('categories','trending'));
    }


    public function login(Request $request){
        if(Auth::attempt($request->only('email','password')))
        {
            // logged in Successfully

            return redirect()->route('home');
        }else{
            return  redirect()->route('login');
        }
    }
    public  function logout(){
        Auth::logout();
        return  redirect()->route('login');
    }
}
