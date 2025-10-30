<?php
use App\Http\Controllers\Fronten\ProductShopController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ChackoutController;
use App\Http\Controllers\Frontend\CustomerLoginController;
use App\Http\Controllers\Frontend\CustomerRegisterController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

//HOMEPAGE ROUTE
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/frontend/search',[HomeController::class,'search'])->name('search.frontend');

//SHOPPAGE ROUTE
Route::get('/shop',[ProductShopController::class,'shop'])->name('frontend.product.shop');
Route::get('/product-filter',[ProductShopController::class,'productFilter'])->name('frontend.shopfilter');
Route::get('/shop/{slug}',[ProductShopController::class,'archiveProduct'])->name('frontend.product');

//SIDBAR PAGE ROUTE
Route::get('/product/sidbar/{slug}',[ProductShopController::class,'sidbar'])->name('frontend.product.sidbar');

//SIGNIN ROUTE
Route::get('/sign-in',[CustomerLoginController::class,'showLoginForm'])->name('customer.login');
Route::post('/sign-in/confirm',[CustomerLoginController::class,'login'])->name('customer.login.confirm');

//SIGNUP ROUTE
Route::get('/sign-up',[CustomerRegisterController::class,'showRegistrationForm'])->name('customer.register');
Route::post('/sign-up/confirm',[CustomerRegisterController::class,'register'])->name('customer.register.confirm');

//Logout
Route::get('/sign-in/logout',[CustomerLoginController::class,'logout'])->name('signout');

//My-PROFILE PAGE
Route::get('/my-profile',[ProfileController::class,'profile'])->name('frontend.profile');

//REVIEW STORE
Route::post('/review/store',[ReviewController::class,'store'])->name('review.store');

//CART ROUTE
Route::get('/cart/index',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');
Route::patch('/cart/update',[CartController::class,'update'])->name('cart.update');
Route::patch('/cart/update',[CartController::class,'update'])->name('cart.update');
Route::get('/cart/destroy/{id}',[CartController::class,'destroy'])->name('cart.destroy');

//CHACKOUT ROUTE
Route::get('/chackout',[ChackoutController::class,'index'])->name('chackout.index');
Route::post('/chackout/store',[ChackoutController::class,'store'])->name('chackout.store');
Route::get('/chackout/success',[ChackoutController::class,'success'])->name('chackout.success');