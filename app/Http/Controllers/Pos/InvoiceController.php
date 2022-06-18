<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\payment;
use App\Models\paymentDetail;
use App\Models\Customer;
use Illuminate\Contracts\View\View;

use function GuzzleHttp\Promise\all;

class InvoiceController extends Controller
{
    public function InvoiceAll(){

        $allData =Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return View('backend.invoice.invoice_all',compact('allData'));

    } // End Method 

    public function InvoiceAdd(){
        $category = Category::all();
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if ($invoice_data == null) {
            $firstReg = '0';
            $invoice_no = $firstReg+1;
         }else{
             $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
             $invoice_no = $invoice_data+1;
         }
         $date = date('Y-m-d');
        return view('backend.invoice.invoice_add',compact('invoice_no','date','category'));



}// End Method


}