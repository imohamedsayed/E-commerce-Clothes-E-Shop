<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    // Show All Suppliers

    public function index()
    {
        $suppliers = DB::table('suppliers')->get();

        return view('dashboard.suppliers.suppliers',compact('suppliers'));
    }


    // Add Supplier Page

    public function add_supplier()
    {
        return view('dashboard.suppliers.add_supplier');
    }

    // insert supplier into database

    public function create(Request $request)
    {
        DB::table('suppliers')->insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now()
        ]);

        return redirect()->route('allSuppliers');
    }

    // Go to edit page
    public function edit_supplier($id)
    {
        $supplier = DB::table('suppliers')->where('id',$id)->first();

        return view('dashboard.suppliers.edit_supplier',compact('supplier'));
    }

    // edit action

    public function update(Request $request,$id){
        DB::table('suppliers')->where('id',$id)->update([
            'name'=>$request->name,
            'updated_at'=>Carbon::now()
        ]);

        return redirect()->route('allSuppliers');
    }

    // delete supplier

    public function delete($id)
    {
        DB::table('suppliers')->where('id',$id)->delete();

        return redirect()->route('allSuppliers');
    }

    // delete all suppliers

    public function deleteAll()
    {
        DB::table('suppliers')->truncate();

        return redirect()->route('allSuppliers');
    }

}
