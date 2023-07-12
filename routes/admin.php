<?php 
use App\Http\Controllers\Admin\ProductsController;
Route::prefix('/admin')->group(function(){

Route::get('/products/home', [ProductsController::class, 'getProductsHome'])->name('productsHome');
});