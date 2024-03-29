<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAndEditSupplier;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    // Show All Suppliers

    public function index()
    {
        $suppliers = Supplier::all();



        return view('dashboard.suppliers.suppliers',compact('suppliers'));
    }


    // Add Supplier Page

    public function add_supplier()
    {
        return view('dashboard.suppliers.add_supplier');
    }

    // insert supplier into database

    public function create(storeAndEditSupplier $request)
    {
        $request->validate([
           'name'=>'required|unique:suppliers|min:10',
        ]);

        Supplier::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('allSuppliers');
    }

    // Go to edit page
    public function edit_supplier($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('dashboard.suppliers.edit_supplier',compact('supplier'));
    }

    // edit action

    public function update(storeAndEditSupplier $request,$id){
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'name'=>'required|unique:suppliers|min:10',
        ]);

        $supplier->update([
            'name' => $request->name,
        ]);

        return redirect()->route('allSuppliers');
    }

    // delete supplier

    public function delete($id)
    {
        Supplier::destroy($id);

        return redirect()->route('allSuppliers');
    }

    // delete all suppliers

    public function deleteAll()
    {
        DB::table('suppliers')->truncate();

        return redirect()->route('allSuppliers');
    }

}
