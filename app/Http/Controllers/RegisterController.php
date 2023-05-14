<?php

namespace App\Http\Controllers;

use App\Http\Requests\regitseringUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public  function  index(){
        if(!is_array(session()->get('cart'))){
            session()->put('cart',[]);
        }
        $categories = DB::table('categories')->get();
        $trending = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');

        return view('auth.signup',compact('categories','trending'));
    }

    public function register(regitseringUser $request)
    {
        User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('login');

    }


}
