<?php

use App\Http\Controllers\BannersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Banners;
use App\Models\Product;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/',[PagesController::class,'index'])->name('home');

Route::get('/viewproduct/{id}',[PagesController::class,'viewproduct'])->name('viewproduct');

//for dashboard category wala
Route::get('/categoryproduct/{id}',[PagesController::class,'categoryproduct'])->name('categoryproduct');

Route::middleware('auth')->group(function () {
    Route::post('cart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('mycart',[CartController::class,'mycart'])->name('mycart');
    Route::get('/cart/{id}/destroy',[CartController::class,'destroy'])->name('cart.destroy');
    Route::get('checkout/{cart_id}',[PagesController::class,'checkout'])->name('checkout');
    Route::get('order/{cart_id}/store',[OrderController::class,'store'])->name('order.store');
    Route::post('order/store',[OrderController::class,'storecod'])->name('order.storecod');

});

//admin page

Route::middleware(['auth','admin'])->group(function () {

//for index
Route::get('/category',[CategoryController::class,'index'])->name('category.index');

//for Category
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');

Route::post('/category/store',[CategoryController::class,'store'])->name('category,store');

Route::get('/category/edit',[CategoryController::class,'edit'])->name('category.edit');

Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');

Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');

Route::delete('/category/destory',[CategoryController::class,'destory'])->name('category.destory');
// get laiii href batw
// post laiii form batw

//productroute

Route::get('/product',[ProductController::class,'index'])->name('product.index');

Route::get('/product/create',[ProductController::class,'create'])->name('product.create');

Route::post('/product/store',[ProductController::class,'store'])->name('product.store');

Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');

Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');

Route::get('/product/{id}/destory',[ProductController::class,'destory'])->name('product.destory');

//orders
Route::get('/orders',[OrderController::class,'index'])->name('order.index');
Route::get('/order/{id}/status/{status}',[OrderController::class,'status'])->name('order.status');



//banners
Route::get('/banner',[BannersController::class,'index'])->name('banner.index');

Route::get('/banner/create',[BannersController::class,'create'])->name('banner.create');

Route::post('/banner/store',[BannersController::class,'store'])->name('banner.store');

Route::get('/banner/{id}/edit',[BannersController::class,'edit'])->name('banner.edit');

Route::put('/banner/{id}/update',[BannersController::class,'update'])->name('banner.update');

Route::get('/banner/{id}/destroy',[BannersController::class,'destroy'])->name('banner.destroy');

});


Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// This page help to connect pages logically
require __DIR__.'/auth.php';
