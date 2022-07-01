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
use Illuminate\Support\Facades\Redis;
use Whoops\Run;
use Barryvdh\DomPDF\Facade\Pdf;
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


public function stockSupplierWise() {
    $suppliers = Supplier::all();
    $category = Category::all();

    return View('backend.stock.supplier_product_wise_report',compact('suppliers', 'category'));
}//end method


public function stockSupplierWisePdf(Request $request){

    $allData = Product::orderBy('supplier_id','asc')->orderBy('category_id',
    'asc')->where('supplier_id',$request->supplier_id)->get();
    return View('backend.pdf.supplier_wise_report_pdf',compact('allData'));

}//end method


public function ProductWisePdf(Request $request){

    $product = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
    return view('backend.pdf.product_wise_report_pdf',compact('product'));

}//end method




    //PDF Download Part Developed By MD TIPU SULTAN
    public function DownloadStock()
    {

        $data = [
            'date' => date('m/d/Y'),

        ];

        $calldata2 = Product::orderBy('supplier_id','asc')->orderBy('category_id',
        'asc')->get();
       
        $pdf = PDF::loadView('backend.downloadpdf.stock_pdf', compact('calldata2','data'));

        return $pdf->download('stock.pdf');
    } // end



}
