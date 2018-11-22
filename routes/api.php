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

/*Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});*/


//login
Route::post('login', 'Auth\LoginController@authenticate');
//logout

// listar todos los servicios
Route::get('services', 'ServiceController@index');
// listar un solo articulo
Route::get('services/{id}', 'ServiceController@show');

//oferta de filtros ordenados por tipo
Route::get('filter-tree', 'FilterTypeController@filterTree');

#Filters
//listar todos los filtros
Route::get('filters', 'FilterController@index');
Route::get('filters/{id}', 'FilterController@show');

#listar sevicios asociados
Route::get('filters/{idFilter}/services', 'FilterController@services');

#FilterType
// listar todos los tipos de servicio
Route::get('filter-types', 'FilterTypeController@index');
// listar un solo tipo de filtro
Route::get('filter-types/{id}', 'FilterTypeController@show');

#Messages
//listar todos los mensajes
Route::get('messages', 'MessageController@index');

Route::middleware(['apiAdmin'])->group(function(){
    #servicios
    // Crear servicios
    Route::post('services', 'ServiceController@store');
    // Actualizar servicio
    Route::put('services/{id}', 'ServiceController@update');
    // Eliminar servicios
    Route::delete('services/{id}', 'ServiceController@destroy');

    #obtener, agregar o quitar filtros
    Route::post('services/{id}/filters/{idFilter}', 'ServiceController@associateFilter');
    Route::delete('services/{id}/filters/{idFilter}', 'ServiceController@removeFilter');

    #filters
    Route::post('filters', 'FilterController@store');
    Route::put('filters/{id}', 'FilterController@update');
    Route::delete('filters/{id}', 'FilterController@destroy');

    #FilterType
    // Crear un tipo de filtro (FilterType)
    Route::post('filter-types', 'FilterTypeController@store');
    // Actualizar un tipo de filtro (FilterType)
    Route::put('filter-types', 'FilterTypeController@store');
    // Eliminar un tipo de filtro (FilterType)
    Route::delete('filter-types/{id}', 'FilterTypeController@destroy');    

    #Messages
    Route::post('messages', 'MessageController@store');
    Route::put('messages/{id}', 'MessageController@update');

    #import | export
    Route::post('import', 'DataManagerController@importData');
    Route::get('dump', 'DataManagerController@exportData');
});