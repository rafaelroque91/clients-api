<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/clients')->group(function () {
    Route::get('/', [ClientController::class, 'listClients']);
    Route::post('/', [ClientController::class, 'newClient']);   
    Route::delete('/{client}', [ClientController::class, 'deleteClient']);  
    Route::post('/filter', [ClientController::class, 'filterClient']);  
});
