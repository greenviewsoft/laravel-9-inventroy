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
    <h3>Stock Report</h3>
    <p> Date:{{  date('d-m-Y') }} </p> 
   
    
    
    <p><strong>Note:</strong>This Invoice Only Test Purpose</p>
  
    <table class="table table-bordered">
        <tr>
             <td><strong>Sl </strong></td>
            <td class="text-center"><strong>Supplier Name</strong></td>
            <td class="text-center"><strong>Category </strong>
            </td>
            <td class="text-center"><strong>Product Name</strong>
            </td>

            <td class="text-center"><strong>In Qty  </strong>
            </td>
            <td class="text-center"><strong>Out Qty  </strong>
            </td>
            <td class="text-center"><strong>Stock Left  </strong>
            </td>

        </tr>
        @php
        $total_stock = '0';
        @endphp

         @foreach(  $calldata2 as $key => $item)
   @php
        $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
        $selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
        @endphp
        <tr>
            <td class="text-center"> {{ $key+1}} </td>
            <td class="text-center"> {{ $item['supplier']['name'] }} </td> 
            <td class="text-center"> {{ $item['category']['name'] }} </td>  
            <td class="text-center"> {{ $item->name }} </td> 
            <td class="text-center"> {{ $buying_total  }}/pcs  </td> 
            <td class="text-center"> {{ $selling_total  }}/pcs </td> 
            <td class="text-center"> {{ $item->quantity }}/pcs </td> 
        </tr>
        @php
       $total_stock += $item->quantity;
       @endphp
       @endforeach



           <tr>
               <td class="no-line"></td>
               <td class="no-line"></td>
               <td class="no-line"></td> 
               <td class="no-line"></td>
               <td class="no-line text-center">
                   <strong> Total Stock  </strong></td>
               <td class="no-line text-end"><h4 class="m-0">{{ $total_stock}}</h4></td>
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