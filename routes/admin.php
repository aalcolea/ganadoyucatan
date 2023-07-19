<?php 
use App\Http\Controllers\Admin\ProductsController;
Route::prefix('/admin')->group(function(){

/*ciudades*/
Route::get('/get-estados', [ProductsController::class, 'getEstados']);
Route::get('/get-ciudades-by-estado/{estadoId}', [ProductsController::class, 'getCiudadesByEstado']);
Route::get('/get-comisarias-by-ciudad/{ciudadId}', [ProductsController::class, 'getComisariasByCiudad']);


Route::get('/products/home', [ProductsController::class, 'getProductsHome'])->name('productsHome');
Route::get('/products/addNewGen', [ProductsController::class, 'getNewGen'])->name('getNewGen');
Route::post('/products/addNewGen', [ProductsController::class, 'postNewGen'])->name('addNewGen');
Route::get('/products/addNewCom', [ProductsController::class, 'getNewCom'])->name('getNewCom');
Route::get('/products/addNewSub', [ProductsController::class, 'getNewSub'])->name('getNewSub');
});