<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//listar todas las categorias
Route::get('registros','App\Http\Controllers\RegistroController@index');

//listar por id
Route::get('registro/{id}','App\Http\Controllers\RegistroController@show');

//guardar
Route::post('registro','App\Http\Controllers\RegistroController@store');

//update
Route::put('registro','App\Http\Controllers\RegistroController@store');

//eliminar
Route::delete('registro/{id}','App\Http\Controllers\RegistroController@destroy');