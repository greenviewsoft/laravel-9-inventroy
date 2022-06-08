<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;

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




//admin all route
Route::controller(SupplierController::class)->group(function (){
Route::get('/supplier/all', 'SuppplierAll')->name('supliers.all');
Route::get('/supplier/add', 'SuppplierAdd')->name('supllier.add');
Route::post('/supplier/store', 'SuppplierStore')->name('supplier.store');
Route::post('/supplier/edit/{id}', 'SuppplierEddit')->name('supplier.edit');






});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
