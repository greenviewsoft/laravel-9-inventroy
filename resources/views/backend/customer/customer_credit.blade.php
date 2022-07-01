@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex  align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Credit Customer All</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('credit.customer.pdf') }}" target="_blank" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-print"> Print Credit Customer  </i></a> <br>  <br>               


                    <h4 class="card-title">Credit Customer All Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Customer Name</th> 
                            <th>Invoice No </th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Action</th>

                        </thead>


                        <tbody>

                        	@foreach($allData as $key => $item)
                            <tr>
                                <td> {{ $key+1}} </td>

                                @if( ! empty($item->customer->name))
                              
                            @endif


                                <td> {{ $item->customer->name ?? 'not found' }} </td> 

                                @if(empty($item))
                                <td> #{{ $item['invoice']['invoice_no'] }}   </td> 
                                @else
                                <p >no invoice no{{ $item->invoice_no }}</p>
                            @endif

                            @if(empty($item))

                                <td> {{  date('d-m-Y',strtotime($item['invoice']['date'])) }} </td> 

                                @else
                                <p>no date</p>
                            @endif
                                <td> {{ $item->due_amount }} </td> 
                                <td>
                                    <a href="{{ route('customer.edit.invoice',$item->invoice_id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>


                                    <a href="{{ route('customer.invoice.details.pdf',$item->invoice_id) }}" target="_blank" class="btn btn-danger sm" title="Customer Invoice Details">  <i class="fa fa-eye"></i> </a>

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