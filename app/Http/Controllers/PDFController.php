<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\payment;

class PDFController extends Controller
{


    //PDF Download Part Developed By MD TIPU SULTAN
    public function DownloadPDF()
    {



        $payment = payment::get();

        $data = [
            'date' => date('m/d/Y'),
            'payment' => $payment
        ];


        $pdf = PDF::loadView('backend.downloadpdf.myPDF', $data);

        return $pdf->download('my.pdf');
    } // end 


    //PDF Download Part Developed By MD TIPU SULTAN
    public function DownloadCredit()
    {
        $payment = payment::get();
        $data = [
            'date' => date('m/d/Y'),
            'payment' => $payment
        ];
        $pdf = PDF::loadView('backend.downloadpdf.creditpdf', $data);

        return $pdf->download('credit.pdf');
    } // end





    

}
