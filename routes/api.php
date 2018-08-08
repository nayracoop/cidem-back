<?php

use Illuminate\Http\Request;

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

// listar todos los servicios
Route::get('services', 'ServiceController@index');

// listar un solo articulo
Route::get('service/{id}', 'ServiceController@show');

// Crear servicios
Route::post('service', 'ServiceController@store');

// Actualizar servicio
Route::put('service', 'ServiceController@store');

// Eliminar servicios
Route::delete('service/{id}', 'ServiceController@destroy');
