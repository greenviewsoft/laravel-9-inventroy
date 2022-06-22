<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StockController extends Controller
{


public function StockReport() {

    $calldata = Product::orderBy('supplier_id','asc')->orderBy('category_id',
    'asc')->get();
    return View('backend.stock.stock_report',compact('calldata'));


} //end method 


public function StockReportPdf(){
    $calldata = Product::orderBy('supplier_id','asc')->orderBy('category_id',
    'asc')->get();
    return View('backend.pdf.stock_report_pdf',compact('calldata'));


}//end method


}
