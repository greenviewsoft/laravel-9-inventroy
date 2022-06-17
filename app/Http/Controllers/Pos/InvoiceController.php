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


        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('backend.invoice.invoice_add',compact('supplier','unit','category'));



}// End Method


}