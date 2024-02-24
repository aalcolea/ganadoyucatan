<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|jwt-auth secret [USIGw4ul7sQHhircDfkSVv2mMAhGH1Ep7N7ZN2zt17Pq0s2NTrLF0arlCdkCbmWP] set successfully.  
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/registerAPI', [APIAuthController::class, 'register']);
Route::post('/loginAPI', [APIAuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
});
/*
Route::middleware('auth')->group(function () {
    Route::post('support-conversations', [SupportConversationController::class, 'store']);
});*/