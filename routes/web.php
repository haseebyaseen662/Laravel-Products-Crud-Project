<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ProductController::class)->group(function() {
    Route::get('/products','index')->name('products.index');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/Products','store')->name('Products.store');
    Route::get('/products/{products}/edit', 'edit')->name('products.edit');
    Route::put('/products/{products}','update')->name('Products.update');
    Route::delete('/products/{product}','destroy')->name('Products.destroy');    
});

