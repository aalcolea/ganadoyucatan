<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\TiendaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/api/products', [ApiController::class, 'getProducts']);
Route::get('/register', [ConnectController::class, 'getRegister']);
Route::post('/register', [ConnectController::class, 'postRegister']);
Route::get('/login', [ConnectController::class, 'getLogin']);
Route::post('/login', [ConnectController::class, 'postLogin'])->name('login');
Route::get('/logout', [ConnectController::class, 'getLogout']);
Route::get('/migrate-passwords', [ConnectController::class, 'migratePasswords']);
/*tienda*/
Route::get('/tienda', [TiendaController::class, 'tiendaHome']);
Route::get('/tienda/producto/{id}/{ruta}', [TiendaController::class, 'tiendaProducto']);
Route::post('/tienda/producto/{id}/{ruta}', [TiendaController::class, 'tiendaProductoMsg'])->name('tiendaProductoMsg');
Route::get('/tianguisTienda', [TiendaController::class, 'getTianguisTienda'])->name('tiendaHome');
Route::get('/tianguis', [TiendaController::class, 'getTianguis'])->name('subirTianguis');
Route::post('/tianguis', [TiendaController::class, 'postTianguis'])->name('postTianguis');
Route::get('/tianguis/producto/{id}', [TiendaController::class, 'tianguisProducto'])->name('tianguisProducto');
Route::get('/subastas', [TiendaController::class, 'getSubastas'])->name('getSubastas');
Route::post('/subastas',  [TiendaController::class, 'sendOffer'])->name('sendOffer');
Route::get('/subastas/{id}', [TiendaController::class, 'getSubasta'])->name('getSubasta');

/*ciudades*/
Route::get('/get-estados', [TiendaController::class, 'getEstados']);
Route::get('/get-ciudades-by-estado/{estadoId}', [TiendaController::class, 'getCiudadesByEstado']);

/* test de chat*/
/*
Route::get('/test-event', function(){
    $user = auth()->user();
    $message = "Este es un mensaje de prueba";
    event(new App\Events\SupportConversationStarted($user, $message));
    return "evento funciono";
});*/