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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Ejercicio 2 y 3
Route::get('clientes', [ClienteController::class, 'indexJson']);
Route::get('clientes-xml', [ClienteController::class, 'indexXml']);

// Route::apiResource('clientes', ClienteController::class);