<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.add_category');
    }
    public function showById($id)
    {
        $products = DB::select('SELECT * FROM `products`join categories on products.category_id = categories.id  where products.category_id = ? order by products.created_at desc limit 9',[$id]);
        $trending = DB::select('SELECT * FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');

        $categories = DB::table('categories')->get();

        return view('category.category', compact('products','categories','trending'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    public function insert(Request $request)
    {
        DB::table('categories')->insert([
            'name' => $request->catName,
            'icon' =>$request->catIcon,
            'created_at'=>Carbon::now()
        ]);
        return "Category Added Successfully";
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
