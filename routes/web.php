<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

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
Route::post('/customer/add', 'CustomerAdd')->name('customer.add');




});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
