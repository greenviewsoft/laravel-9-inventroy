<!DOCTYPE html>
<html>
<head>
    <title>Green View Soft</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<div> 

    <img src="{{ public_path('backend/assets/images/greenit.png') }}" style="width: 120px; height: 70px">
    <h1>GreenViewSoft</h1>
    <h3>Purchase Report</h3>
    <p> Date:{{  date('d-m-Y') }} </p> 
   
    
    
    <p><strong>Note:</strong>This Invoice Only Test Purpose</p>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td><strong>Sl </strong></td>
            <td class="text-center"><strong>Purchase No  </strong>
            </td>
            <td class="text-center"><strong>Date</strong>
            </td>
            <td class="text-center"><strong>Product Name </strong></td>
            <td class="text-center"><strong>Quanity</strong>
            </td>
            <td class="text-center"><strong>Unit Price   </strong>
            </td>
            <td class="text-center"><strong>Total Price  </strong>
            </td>


        </tr>
        </thead>
        <tbody>
       
            @php
            $total_sum = '0';
            @endphp
      
        @foreach($calldata as $key => $item)

      
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $item->purchase_no }}</td>
            <td class="text-center">{{ date('d-m-Y',strtotime($item->date)) }}</td>
            <td class="text-center">{{ $item['product']['name']}}</td>
            <td class="text-center">{{ $item->buying_qty}} {{ $item['product']['unit']['name'] }}</td>
            <td class="text-center">{{ $item->unit_price}}</td>
            <td class="text-center">{{ $item->buying_price}}</td>



        </tr>
        @php
        $total_sum += $item->buying_price;
        @endphp
        @endforeach

        <tr>
                <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="no-line"></td> 
                <td class="no-line"></td>
                <td class="no-line text-center">
                    <strong>Grand Total</strong></td>
                <td class="no-line text-end"><h4 class="m-0"> {{ $total_sum}}</h4></td>
            </tr>

                            </tbody>
                        </table>
                    </div>

                    @php
                    $date = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
                    @endphp         
                    <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>   
                               <br>       <br>   <br>
                    <p><strong>Signature</strong></p>
 
                    <p class="text-center"><strong>End Of Repoort</strong></p>
                    
 </body>
 </html>