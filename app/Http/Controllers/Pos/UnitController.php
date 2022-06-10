<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon;
class UnitController extends Controller
{
    public   function UnitAll(){

// $Unit = Unit::all();

$Units = Unit::latest()->get();

return view('backend.unit.Unit_all',compact('Units'));

    }// end method


public function UnitAdd(){


    return view('backend.unit.Unit_add');

}// end method

    

public function UnitStore(Request $request){

    Unit::insert([
        'name' => $request->name,
        'created_by' => Auth::user()->id,
        'created_at' => Carbon::now(), 

    ]);

     $notification = array(
        'message' => 'Unit Inserted Successfully', 
        'alert-type' => 'success'
    );

    return redirect()->route('unit.all')->with($notification);
} // End Method 


public function UnitEdit($id){


    $unit = Unit::findOrFail($id);
    return view('backend.unit.unit_edit',compact('unit'));

}// End Method 

public function UnitUpdate(Request $request){
$unit_id = $request->id;

Unit::findOrFail($unit_id)->update([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Unit Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);


}// end method 


public function UnitDelete($id){
    Unit::findOrFail($id)->delete();

    $notification = array(
         'message' => 'Unit Deleted Successfully', 
         'alert-type' => 'success'
     );

     return redirect()->back()->with($notification);

 } // End Method 

}

    

