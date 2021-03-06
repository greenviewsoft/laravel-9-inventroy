<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/dashboard') }}" class="waves-effect">
                        <i class="ri-home-fill"></i> 
                        <span>Dashboard</span>
                    </a>
                </li>

              
    
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Mange Supliers</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('supliers.all') }}">All Supplier</a></li>
          
        </ul>
    </li>

  <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Mange Customer</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('customer.all') }}">All Customer</a></li>
            <li><a href="{{ route('credit.customer') }}">Credit Customer</a></li>
            <li><a href="{{ route('paid.customer') }}">Paid Customer</a></li>
            <li><a href="{{ route('customer.wise.report') }}">Customer Wise Report</a></li>
          
        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Mange Unit</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('unit.all') }}">All Unit</a></li>
          
        </ul>
    </li>


    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Mange Category</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('category.all') }}">All Category</a></li>
          
        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Mange Product</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('product.all') }}">All Product</a></li>
          
        </ul>
    </li>


    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Mange Purchase</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('purchased.all') }}">All Purchase</a></li>
            <li><a href="{{ route('purchase.pending') }}">Aproval Purchase</a></li>
            <li><a href="{{ route('dailyPurchaseReport') }}">Daily Purchase Report</a></li>
        </ul>
       
  
    </li>


    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-mail-send-line"></i>
            <span>Mange Invoice</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('invoice.all') }}">All Invoice</a></li>
            <li><a href="{{ route('invoice.pending.list') }}">Aproval Invoice</a></li>
            <li><a href="{{ route('print.invoice.list') }}">Print Invoice</a></li>
            <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>
        </ul>
    </li>


</li>







    
                <li class="menu-title">Stock</li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-account-circle-line"></i>
                <span>Mange Stock</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('stock.report')}}"> Stock Report </a></li>
                <li><a href="{{ route('stock.supplier.wise') }}"> Supplier / Product Wise Report </a></li>
                
            </ul>
        </li>
    </ul>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Other Soon</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">soon page</a></li>
                      
                    </ul>
                </li>

                <li class="menu-title">Components</li>

                

                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>