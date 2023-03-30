<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductControoler extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id  order by products.created_at asc');

        return view('dashboard.products.products',compact('products'));

    }

    public function addProduct()
    {
        $categories=DB::table('categories')->get();

        return view('dashboard.products.add_product',compact('categories'));
    }


    public function insert(Request $request)
    {
        DB::table('products')->insert([
            'category_id' => $request->catID,
            'title' => $request->title,
            'price' =>$request->price,
            'discount'=>$request->discount,
            'img'=>$request->img,
            'sales'=>$request->sales,
            'origin'=>$request->origin,
            'gender'=>$request->gender,
            'age_group'=>$request->ageGroup,
            'rate'=>$request->rate,
            'created_at'=>Carbon::now()

        ]);

        return redirect()->route('allProducts');
    }

    public function showEdit($id)
    {
        $categories=DB::table('categories')->get();
        $product = DB::select ("SELECT * FROM products WHERE id = ?",[$id])[0];


        return view('dashboard.products.edit_product',compact('categories','product'));

    }

    public function update(Request $request,$id)
    {
        DB::table('products')->where('id',$id)->update([
            'title'=>$request->title,
            'category_id'=>$request->catID,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'img'=>$request->img,
            'sales'=>$request->sales,
            'origin'=>$request->origin,
            'gender'=>$request->gender,
            'age_group'=>$request->ageGroup,
            'rate'=>$request->rate,
            'updated_at'=>Carbon::now()
        ]);

        return redirect()->route('allProducts');
    }

    public function delete($id){
        DB::table('products')->where('id',$id)->delete();

        return redirect()->route('allProducts');
    }

    public function deleteAll(){

        // Delete

        DB::table('products')->truncate();

        return redirect()->route('allProducts');
    }


}
