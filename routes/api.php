<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tickets', 'App\Http\Controllers\TicketController@index');
Route::post('/tickets', 'App\Http\Controllers\TicketController@store');
Route::put('/tickets/{id}', 'App\Http\Controllers\TicketController@update');
Route::delete('/tickets/{id}', 'App\Http\Controllers\TicketController@destroy');

Route::get('/materials', 'App\Http\Controllers\MaterialController@index');
Route::post('/materials', 'App\Http\Controllers\MaterialController@store');
Route::put('/materials/{id}', 'App\Http\Controllers\MaterialController@update');
Route::delete('/materials/{id}', 'App\Http\Controllers\MaterialController@destroy');

Route::get('/clientes', 'App\Http\Controllers\ClienteController@index');
Route::post('/clientes', 'App\Http\Controllers\ClienteController@store');
Route::put('/clientes/{id}', 'App\Http\Controllers\ClienteController@update');
Route::delete('/clientes/{id}', 'App\Http\Controllers\ClienteController@destroy');

