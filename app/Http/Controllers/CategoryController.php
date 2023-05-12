<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::all();
        return view('dashboard.categories.categories',compact('categories'));
    }



    public function showById($id)
    {
        $products = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id  where products.category_id = ? order by products.created_at desc limit 9',[$id]);
        $trending = DB::select('SELECT products.*,categories.name  FROM `products`join categories on products.category_id = categories.id order by sales desc  limit 5');

        $categories = DB::table('categories')->get();

        return view('category.category', compact('products','categories','trending'));

    }

    // dashboard


    // show addition page

    public function addCategory()
    {
        return view('dashboard.categories.add_category');
    }

    public function insert(Request $request)
    {
        Category::create([
            'name' => $request->catName,
            'icon' =>$request->catIcon,
        ]);

        return redirect()->route('allCategories');
    }


    // show edit page

    public function updateCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit_category',compact('category'));

    }


    // update action

    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' =>$request->catName,
            'icon' =>$request->catIcon,
        ]);
        return redirect()->route('allCategories');

    }


    // delete action

    public function delete($id)
    {
        Category::destroy($id);

        return redirect()->route('allCategories');

    }

    // delete all action

    public function deleteAll(){
        DB::table('categories')->truncate();
        return redirect()->route('allCategories');
    }
}
