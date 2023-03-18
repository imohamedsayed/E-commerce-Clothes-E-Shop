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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=DB::table('categories')->get();

       return view('product.add_product',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public  function insert(Request $request)
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
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
