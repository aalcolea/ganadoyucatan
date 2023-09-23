<?php 
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ConversationController;
Route::prefix('/admin')->group(function(){

/*ciudades*/
Route::get('/get-estados', [ProductsController::class, 'getEstados']);
Route::get('/get-ciudades-by-estado/{estadoId}', [ProductsController::class, 'getCiudadesByEstado']);
Route::get('/get-comisarias-by-ciudad/{ciudadId}', [ProductsController::class, 'getComisariasByCiudad']);
/*productos*/
Route::get('/products/home', [ProductsController::class, 'getProductsHome'])->name('productsHome');
Route::get('/products/addNewGen', [ProductsController::class, 'getNewGen'])->name('getNewGen');
Route::post('/products/image-action', [ProductsController::class, 'imageAction'])->name('product.image_action');
Route::post('/products/image-actionS', [ProductsController::class, 'imageActionSub'])->name('product.image_actionS');
Route::post('/products/addNewGen', [ProductsController::class, 'postNewGen'])->name('addNewGen');
Route::get('/products/addNewCom', [ProductsController::class, 'getNewCom'])->name('getNewCom');
Route::get('/products/addNewSub', [ProductsController::class, 'getNewSub'])->name('getNewSub');
Route::post('/products/addNewSub', [ProductsController::class, 'postNewSub'])->name('postNewSub');
Route::get('/products/deleteSub/{id}', [ProductsController::class, 'deleteSub'])->name('deleteSub');
Route::get('/products/getProductInfo/{id}', [ProductsController::class, 'getProductEdit'])->name('getProductEdit');
Route::post('/products/postProductInfo/{id}', [ProductsController::class, 'postProductEditGen'])->name('postProductEdit');
Route::get('/products/getSubInfo/{id}', [ProductsController::class, 'getSubEdit'])->name('getSubEdit');
/*mensajes*/
Route::get('/mensajes', [ProductsController::class, 'getMensajesHome'])->name('mensajesHome');
/*Usuarios*/
Route::get('/users', [UsersController::class, 'getUsers'])->name('usersHome');
Route::get('/get-user-info/{id}', [UsersController::class, 'getUserInfo']);
Route::post('/users/edit/{id}', [UsersController::class, 'postEditUser'])->name('postEditUser');
Route::get('users/profile', [UsersController::class, 'getUProfInfo']);
/*chat soporte*/
 Route::get('/conversation', [ConversationController::class, 'index'])->name('conversationIndex');
  Route::get('/conversation/{conversation}', [ConversationController::class, 'show'])->name('conversationShow');
 	//Route::get('/conversation/{conversation}', Chat::class)->name('conversationShow');
    Route::get('/startChat', [Chat::class, 'sendMessage'])->name('startChat');
});
