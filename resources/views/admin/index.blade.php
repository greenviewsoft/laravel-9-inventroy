@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">GreenViewSoft</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Customer</p>
                                    <?php  $CustomerCount=DB::table('customers')->count(); ?>
                                    <h4 class="mb-2">{{ $CustomerCount }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-shopping-cart-2-line font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                            
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Sell</p>
                                    <?php  $totalsell=DB::table('payments')->count(); ?>
                                    <h4 class="mb-2">{{ $totalsell }}</h4>
                                    <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Sell Amount</p>
                                    
                                    <?php $mysum= App\Models\payment::sum('total_amount');
                                    ?>


                                

                                  
                                    <h4 class="mb-2">{{ $mysum }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-user-3-line font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Due</p>
                                    <?php $mysum2=App\Models\payment::sum('due_amount');
  
                                    ?>
                                    <h4 class="mb-2">{{ $mysum2 }}</h4>
                                    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-btc font-size-24"></i>  
                                    </span>
                                </div>
                            </div>                                              
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                
                            </div>

                            <h4 class="card-title mb-4">All Orders</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <td><strong>Sl </strong></td>
                                            <th>Customer Name</th>
                                            <th>Product Name</th>
                                            <th>Invoice No</th>
                                            <th> Date</th>
                                            <th>Paid Amount</th>
                                            <th>Due Amount</th>
                                        
                                            <th style="width: 120px;">Total Amount</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @php
    

$invoice_details = App\Models\InvoiceDetail::get();

        @endphp
        
                                        @foreach($invoice_details as $key => $details)
                                        <tr>
                                            <td class="text-center"> {{ $key+1}} </td>

                                            <td class="text-center"></td>


                                            <td>Produt Name</td>
                                            <td>
                                                <div class="font-size-13"><i class=" font-size-10 text-success align-middle me-2"></i>{{  date('d-m-Y',strtotime( $details['date'])) }}</div>
                                            </td>
                                           
                                                <td class="text-center"> <p> test </p> </td> 

                                                
                                                <td class="text-center"> <p> test 3</p> </td> 


                                                <td class="text-center"> <p>hrllo</p> </td> 
                                                <td class="text-center"> <p>Total  Amount</p> </td> 
                                        </tr>
                                        @endforeach
                                        
                                        
                                        
                                        
                                       
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
               
            </div>
            <!-- end row -->
        </div>
        
    </div>
    <!-- End Page-content -->
   
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Upcube.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart "></i> by Greenviewsoft
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
</div>
<!-- end main content-->

@endsection