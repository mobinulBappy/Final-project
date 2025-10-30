<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChaceController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::middleware('auth')->group(function(){
//Admin Route
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

//Category Route
Route::get('/categoy/{id?}',[CategoryController::class,'index'])->name('category.index');
Route::get('/categoy/featured/{id}',[CategoryController::class,'featured'])->name('category.featured');
Route::post('/categoy/store',[CategoryController::class,'store'])->name('category.store');
Route::patch('/categoy/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/categoy/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');


//Product Route
Route::get('/product',[ProductController::class,'index'])->name('product.index');

Route::get('/product/create/{id?}',[ProductController::class,'create'])->name('product.create');
Route::get('/product/featured/{id?}',[ProductController::class,'featured'])->name('product.featured');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::patch('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');


//ORDERS ROUTE
Route::get('/dashboard/order',[OrderController::class,'index'])->name('order.index');

Route::patch('/admin/orders/{order}/update-status', [OrderController::class, 'updateStatus'])
    ->name('admin.orders.update-status');

Route::get('/dashboard/pending',[OrderController::class,'pending'])->name('order.pending');
Route::get('/dashboard/confirm',[OrderController::class,'confirm'])->name('order.confirm');
Route::get('/dashboard/deliver',[OrderController::class,'deliver'])->name('order.deliver');
Route::get('/dashboard/complete',[OrderController::class,'complete'])->name('order.complete');

//Customer Route
Route::get('/dashboar/customer',[CustomerController::class,'customer'])->name('customer.list');

//Admin Route
Route::get('/dashboar/admin',[AdminController::class,'admin'])->name('admin.list');

//Chase clear
Route::get('/chace-clear',[ChaceController::class,'chace'])->name('chace');
});