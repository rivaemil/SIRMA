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
