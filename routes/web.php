<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\PDFController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function (){


//PDF Download Route
Route::get('download-pdf', [PDFController::class, 'DownloadPDF']);
Route::get('download-credit', [PDFController::class, 'DownloadCredit']);

    
    
    

//admin all route
Route::controller(AdminController::class)->group(function (){
Route::get('/admin/logout', 'destroy')->name('admin.logout');
Route::get('/admin/profile', 'Profile')->name('admin.profile');
Route::get('/admin/edit', 'EditProfile')->name('edit.profile');
Route::post('/store/profile', 'StoreProfile')->name('store.profile');
Route::get('/change/password', 'ChangePassword')->name('change.password');
Route::post('/update/password', 'UpdatePassword')->name('update.password');



});




//supplier all route
Route::controller(SupplierController::class)->group(function (){
Route::get('/supplier/all', 'SuppplierAll')->name('supliers.all');
Route::get('/supplier/add', 'SuppplierAdd')->name('supllier.add');
Route::post('/supplier/store', 'SuppplierStore')->name('supplier.store');
Route::get('/supplier/edit/{id}', 'SuppplierEddit')->name('supplier.edit');
Route::post('/supplier/update/', 'SuppplierUpdate')->name('supplier.update');
Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');

});


//Customer all route
Route::controller(CustomerController::class)->group(function (){
Route::get('/customer/all', 'CustomerAll')->name('customer.all');
Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
Route::post('/customer/store', 'CustomerStore')->name('customer.store');
Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');

Route::get('/credit/customer/', 'CreditCustomer')->name('credit.customer');
Route::get('/credit/customer/pdf', 'CreditCustomerPdf')->name('credit.customer.pdf');
Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
Route::post('/customer/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');
Route::get('/customer/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');
Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
Route::get('/paid/customer/print/pdf', 'PaidPrintPdf')->name('paid.customer.print.pdf');
Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
Route::get('/customer/wise/Credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
Route::get('/customer/wise/Paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');
Route::get('/customer/wise/Paid/pdf/gen', 'CustomerPdfGen')->name('customer.paid.pdf_gen');
Route::get('/customer/index', 'CustomerIndex')->name('customer.index');


// ----------------------------- home dashboard ------------------------------//
Route::get('/dashboard', 'Index2');

// Route::get('/customer/list',  'CustomerList')->name('customer.paid.pdf_gen'); 


});

//Unit all route
Route::controller(UnitController::class)->group(function (){
    Route::get('/unit/all', 'UnitAll')->name('unit.all');
    Route::get('/unit/add', 'UnitAdd')->name('unit.add');
    Route::post('/unit/store', 'UnitStore')->name('unit.store');
    Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
    Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');

    
    });


//Category all route
Route::controller(CategoryController::class)->group(function (){
    Route::get('/category/all', 'CategoryAll')->name('category.all');
    Route::get('/category/add', 'CategoryAdd')->name('category.add');
    Route::post('/category/store', 'CategoryStore')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
    Route::post('/category/update', 'CategoryUpdate')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');

    
    });

    // Product All Route 
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all', 'ProductAll')->name('product.all'); 
    Route::get('/product/add', 'ProductAdd')->name('product.add');
    Route::post('/product/store', 'ProductStore')->name('product.store');
    Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::post('/product/update', 'ProductUpdate')->name('product.update');
    Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
});
 


    // purchased All Route 
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/purchased/all', 'PurchasedAll')->name('purchased.all'); 
        Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
        Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
        Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
        Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
        Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
        Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('dailyPurchaseReport');
        Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');
        Route::get('/purchase/pdf/download', 'PurchasePdf')->name('Purchase.pdf');

    });


    // Invoice Routes
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all'); 
        Route::get('/invoice/add', 'InvoiceAdd')->name('invoice.add'); 
        Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store'); 
        Route::get('/invoice/pending', 'InvoicePending')->name('invoice.pending.list'); 
        Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete'); 
        Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve'); 
        Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');
        Route::get('/print/invoice/list', 'PrintInvoiceList')->name('print.invoice.list');
        Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');
        Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
        Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');

    });




    // Stock Routes
    Route::controller(StockController::class)->group(function () {
        Route::get('/stock/report', 'StockReport')->name('stock.report'); 
        Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf'); 

        Route::get('/stock/supplier/wise', 'stockSupplierWise')->name('stock.supplier.wise'); 
        Route::get('/stock/supplier/wise/pdf', 'stockSupplierWisePdf')->name('supplier.wise.report.pdf'); 
        Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');
        Route::get('/DownloadStock/stock/pdf', 'DownloadStock')->name('downloadStock.pdf');
       
 

    });


}); // End  middlewareGroups



    // Default  All Route 
    Route::controller(DefaultController::class)->group(function () {
        Route::get('/get-category', 'GetCategory')->name('get-category'); 
        Route::get('/get-product', 'GetProduct')->name('get-product');
        Route::get('/check-product', 'GetStock')->name('check-product-stock'); 
        


     
    });



// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
