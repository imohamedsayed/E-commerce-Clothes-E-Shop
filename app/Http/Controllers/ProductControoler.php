<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = DB::select('SELECT products.*,categories.name, suppliers.name as sname  FROM `products`join categories on products.category_id = categories.id join suppliers on products.supplier_id = suppliers.id  order by products.created_at asc');

        return view('dashboard.products.products',compact('products'));

    }

    public function addProduct()
    {
        $categories=DB::table('categories')->get();
        $suppliers=DB::table('suppliers')->get();

        return view('dashboard.products.add_product',compact('categories','suppliers'));
    }


    public function insert(Request $request)
    {
        Product::create([
            'category_id' => $request->catID,
            'supplier_id' => $request->supID,
            'title' => $request->title,
            'price' =>$request->price,
            'discount'=>$request->discount,
            'img'=>$request->img,
            'sales'=>$request->sales,
            'origin'=>$request->origin,
            'gender'=>$request->gender,
            'age_group'=>$request->ageGroup,
            'rate'=>$request->rate
        ]);

        return redirect()->route('allProducts');
    }

    public function showEdit($id)
    {
        $categories=DB::table('categories')->get();
        $suppliers=DB::table('suppliers')->get();

        $product = Product::findOrFail($id);
        // or  $product = Product::where('id', $id)->first();


        return view('dashboard.products.edit_product',compact('categories','product','suppliers'));

    }

    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'title'=>$request->title,
            'category_id'=>$request->catID,
            'supplier_id'=>$request->supID,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'img'=>$request->img,
            'sales'=>$request->sales,
            'origin'=>$request->origin,
            'gender'=>$request->gender,
            'age_group'=>$request->ageGroup,
            'rate'=>$request->rate,
        ]);

        return redirect()->route('allProducts');
    }

    public function delete($id){
        Product::destroy($id);
        return redirect()->route('allProducts');
    }

    public function deleteAll(){

        // Delete

        DB::table('products')->truncate();

        return redirect()->route('allProducts');
    }


}
