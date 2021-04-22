<?php

use Illuminate\Support\Facades\Route;

// Import my Controllers
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DireccionesController;

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

// Default Route
Route::get('/', [ClienteController::class, 'index']);

Route::get('/ejercicio4', [ClienteController::class, 'ejercicio4']);
Route::get('/ejercicio5', [ClienteController::class, 'ejercicio5']);

// Resource because my controller was created with --resource
// my route will be clients/create  clients/edit etc 
// we need a controller and method but by default the method will be index()
// Route::resource('clientes', 'App\Http\Controllers\ClienteController'); // ok


Route::resource('clientes', ClienteController::class); // without array if there isnt a method explicitly
Route::resource('direcciones', DireccionesController::class); // without array if there isnt a method explicitly
                            //    [UserController::class, 'index']




// Ver archivo api.php para obtener la data para el Ejercicio 2 y 3 en JSON y XML
// Route::get('/clientes-api/json', [ClienteController::class, 'indexJson']);
// Route::get('/clientes-api/xml', [ClienteController::class, 'indexXml']);