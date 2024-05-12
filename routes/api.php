<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/cliente/create', [ClienteController::class, 'create']);
Route::get('/cliente/{id}', [ClienteController::class, 'recover']);
Route::get('/cliente/all', [ClienteController::class, 'recoverAll']);
Route::put('/cliente/update', [ClienteController::class, 'update']);
Route::delete('/cliente/{id}', [ClienteController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
