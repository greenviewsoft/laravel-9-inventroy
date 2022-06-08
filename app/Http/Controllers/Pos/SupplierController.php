<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supllier;
use Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function SuppplierAll(){

// $supllier = Supllier::all();

$supllier = Supllier::latest()->get();

return view('backend.supplier.supplier_all',compact('supllier'));

    }// end method



    public function SuppplierAdd(){



return view('backend.supplier.supplier_add');
    }// end method 




public function SuppplierStore(Request $request){

        Supllier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Supplier Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('supliers.all')->with($notification);

    } // End Method 


public function SuppplierEddit($id){

$supllier = Supllier::findOrFail($id);
return view('backend.supllier.supplier_eddit',compact('supllier'));


}// end method

}
