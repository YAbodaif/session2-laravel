<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//show all
Route::get('products',[ProductController::class,'index'])->name('products_index');

//show one
Route::get('products/show/{id}',[ProductController::class,'show'])->name('products_show');

//Add New
Route::get('products/create',[ProductController::class,'create'])->name('products_create');
Route::post('products/store',[ProductController::class,'store'])->name('products_store');


//Delete
Route::get('products/create/{id}',[ProductController::class,'delconfirm'])->name('products_delconfirm');
Route::get('products/delete/{id}',[ProductController::class,'delete'])->name('products_delete');

//update
Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('products_edit');
Route::post('products/update/{id}',[ProductController::class,'update'])->name('products_update');

//// Categories route
//show all
Route::get('categories',[CategoryController::class,'index'])->name('categories_index');

//show one
Route::get('categories/show/{id}',[CategoryController::class,'show'])->name('categories_show');

//Add New
Route::get('categories/create',[CategoryController::class,'create'])->name('categories_create');
Route::post('categories/store',[CategoryController::class,'store'])->name('categories_store');


//Delete
Route::get('categories/create/{id}',[CategoryController::class,'delconfirm'])->name('categories_delconfirm');
Route::get('categories/delete/{id}',[CategoryController::class,'delete'])->name('categories_delete');

//update
Route::get('categories/edit/{id}',[CategoryController::class,'edit'])->name('categories_edit');
Route::post('categories/update/{id}',[CategoryController::class,'update'])->name('categories_update');

//// seller route
//show all
Route::get('sellers/',[SellerController::class,'index'])->name('sellers_index');

//show one
Route::get('sellers/show/{id}',[SellerController::class,'show'])->name('sellers_show');

//Add New
Route::get('sellers/create',[SellerController::class,'create'])->name('sellers_create');
Route::post('sellers/store',[SellerController::class,'store'])->name('sellers_store');


//Delete
Route::get('sellers/create/{id}',[SellerController::class,'delconfirm'])->name('sellers_delconfirm');
Route::get('sellers/delete/{id}',[SellerController::class,'delete'])->name('sellers_delete');

//update
Route::get('sellers/edit/{id}',[SellerController::class,'edit'])->name('sellers_edit');
Route::post('sellers/update/{id}',[SellerController::class,'update'])->name('sellers_update');
