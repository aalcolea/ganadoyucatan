<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ConnectController;
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
    return view('home');
});

Route::get('/api/products', [ApiController::class, 'getProducts']);
Route::get('/register', [ConnectController::class, 'getRegister']);
Route::post('/register', [ConnectController::class, 'postRegister']);
Route::get('/login', [ConnectController::class, 'getLogin']);
Route::post('/login', [ConnectController::class, 'postLogin'])->name('login');
Route::get('/logout', [ConnectController::class, 'getLogout']);
Route::get('/migrate-passwords', [ConnectController::class, 'migratePasswords']);
