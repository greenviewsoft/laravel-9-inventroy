@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Purchase All</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('purchase.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Purchase </i></a> <br>  <br>        

                    <h4 class="card-title">Purchase All Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Purhase No</th> 
                            <th>Date </th>
                            <th>Supplier</th>
                            <th>Category</th> 
                            <th>Qty</th> 
                            <th>Product Name</th> 
                            <th>Status</th>
                            <th>Action</th>

                        </thead>


                        <tbody>

                        	@foreach($allData as $key => $item)
            <tr>
                <td> {{ $key+1}} </td>
                <td> {{ $item->purchase_no }} </td> 
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>


                <td> {{ $item['supplier']['name'] }} </td> 
                <td> {{ $item['category']['name'] }} </td> 
                <td> {{ $item->buying_qty }} </td> 
                <td> {{ $item['product']['name'] }} </td> 


                 {{-- <td> {{ $item->supplier_id }} </td> 
                 <td> {{ $item->category_id }} </td>  
                 <td> {{ $item->buying_qty }} </td> 
                 <td> {{ $item->product_id }} </td>  --}}
                 
                 
                 <td>
                    @if($item->status == '0')
                    <span class="btn btn-warning"> Pending</span> 
                 @elseif($item->status == '1')
                 <span class="btn btn-success">Aproved</span>
                @endif
                </td> 

                <td> 
                    @if($item->status == '0')
<a href="{{ route('purchase.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
@endif
                </td>

            </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection 