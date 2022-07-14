<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PaymentDetail;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image As Image;
use Whoops\Run;

use function GuzzleHttp\Promise\all;

class CustomerController extends Controller
{

public function CustomerAll(){

// $customers = Customer::all();

// All Customer List Data 
 $customers = Customer::latest()->get();

return view('backend.customer.customer_all',compact('customers'));

}// Method p


// All Customer List
// public function Customerlist(){

//        $hellodata =Customer::all();

// return view('admin.index',compact('hellodata'));

// }// Method p


// Customer Add method
public function CustomerAdd(Request $request){


   return view('backend.customer.customers_add');


}// end method


// Customer Store method
public function CustomerStore(Request $request){

        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url ,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Customer Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    } // End Method

    // Customer Edit method
    public function CustomerEdit($id){

       $customer = Customer::findOrFail($id);
       return view('backend.customer.customer_edit',compact('customer'));

    } // End Method



// Customer Update method
    public function CustomerUpdate(Request $request){

       $customer_id = $request->id;
       $customer_img = Customer::find($request->id);

        if ($request->file('customer_image')) {

            $path = public_path().'/'.  $customer_img ->customer_image;
            unlink($path); 

         $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;

        Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url ,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Customer Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

        } else{

          Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address, 
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Customer Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

        } // end else 


      }// end method


      // Customer Delete method
      public function CustomerDelete($id){

        $customers = Customer::findOrFail($id);
        $img = $customers->customer_image;
        unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method



    // Customer All Credit Customer 
    public function CreditCustomer(){

            $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.customer.customer_credit',compact('allData'));

    }// End Method



    // Customer Credit Customer
    public function CreditCustomerPdf(){

         $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf',compact('allData'));

    }// End Method



    //  Customer Invoice edit
    public function CustomerEditInvoice($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.customer.edit_customer_invoice',compact('payment'));

    }// End Method


//CustomerInvoiceDetails  Update
    public function CustomerUpdateInvoice(Request $request,$invoice_id){

        if ($request->new_paid_amount < $request->paid_amount) {

            $notification = array(
            'message' => 'Sorry You Paid Maximum Value', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification); 
        } else{
            $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_paid') {
                 $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                 $payment->due_amount = '0';
                 $payment_details->current_paid_amount = $request->new_paid_amount;

            } elseif ($request->paid_status == 'partial_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;

            }

            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d',strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment_details->save();

              $notification = array(
            'message' => 'Invoice Update Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('credit.customer')->with($notification); 


        }

    }// End Method

//All CustomerInvoiceDetails
    public function CustomerInvoiceDetails($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pdf.invoice_details_pdf',compact('payment'));

    }// End Method



//All Paid Customer List

public function PaidCustomer(){



     $allData = Payment::where('paid_status','!=' ,'full_due')->get();
return view('backend.customer.customer_paid',compact('allData'));
}// End Method




public function PaidPrintPdf(){
$allData = Payment::where('paid_status','!=' ,'full_due')->get();
return view('backend.pdf.customer_paid_pdf',compact('allData'));

}// End Method


public function CustomerWiseReport(){

    $customers = Customer::all();
    return view('backend.customer.customer_wise_report',compact('customers'));

}// End Method


public function CustomerWiseCreditReport(Request $request){

    $allData = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
    return view('backend.pdf.customer_wise_credit_pdf',compact('allData'));

}// End Method


public function CustomerWisePaidReport(Request $request){

    $allData = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=' ,'full_due')->get();
    return view('backend.pdf.customer_wise_paid_pdf',compact('allData'));

}// End Method






public function Index2(){
    $allData5 = Payment::where('paid_status','!=' ,'full_due')->latest()->get();
   return view('admin.index',compact('allData5'));

   
}// End Method






}






  