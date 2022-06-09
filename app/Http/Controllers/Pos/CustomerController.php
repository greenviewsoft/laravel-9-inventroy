<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{

public function CustomerAll(){

// $supllier = Supllier::all();

$customers = Customer::latest()->get();

return view('backend.customer.customer_all',compact('customers'));

}// Method p


public function CustomerAdd(Request $request){


   return view('backend.customer.customers_add');


}// end method



}
