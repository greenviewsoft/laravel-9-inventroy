<!DOCTYPE html>
<html>
<head>
    <title>Green View Soft</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<div> 

    <img src="{{ public_path('backend/assets/images/greenit.png') }}" style="width: 120px; height: 70px">
    <h1>Green View IT</h1>
   <address>address:3/2 Mirpur Dhaka</address>
    
    <p> Date {{ $date }}</p>
    <p><strong>Note:</strong>This Invoice Only Test Purpose</p>
  
    <table class="table table-bordered">
        <tr>
            <td><strong>Sl </strong></td>
            <td class="text-center"><strong>Customer Name </strong></td>
            <td class="text-center"><strong>Invoice No  </strong>
            </td>
            <td class="text-center"><strong>Date</strong>
            </td>
            <td class="text-center"><strong>Paid Amount  </strong>
            </td>
            <td class="text-center"><strong>Due Amount  </strong>
            </td>

        </tr>
        @php
        $total_due = '0';
        @endphp

         @foreach($payment as $key => $item)

        <tr>
            <td class="text-center"> {{ $key+1}} </td>
            <td class="text-center"> {{ $item['customer']['name'] }} </td> 
            <td class="text-center"> #{{ $item['invoice']['invoice_no'] }}   </td> 
            <td class="text-center"> {{  date('d-m-Y',strtotime($item['invoice']['date'])) }} </td> 
            <td class="text-center"> {{ $item->paid_amount }} </td> 
            <td class="text-center"> {{ $item->due_amount }} </td> 
        </tr>
        @php
       $total_due += $item->due_amount;
       @endphp
       @endforeach



           <tr>
               <td class="no-line"></td>
               <td class="no-line"></td>
               <td class="no-line"></td> 
               <td class="no-line"></td>
               <td class="no-line text-center">
                   <strong>Grand Due Total</strong></td>
               <td class="no-line text-end"><h4 class="m-0">{{ $total_due}}</h4></td>
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
                   
</body>
</html>