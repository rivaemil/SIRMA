<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/tickets', 'App\Http\Controllers\TicketController@index');
Route::post('api/tickets', 'App\Http\Controllers\TicketController@store');
Route::put('api/tickets/{id}', 'App\Http\Controllers\TicketController@update');
Route::delete('api/tickets/{id}', 'App\Http\Controllers\TicketController@destroy');

Route::get('api/materiales', 'App\Http\Controllers\MaterialController@index');
Route::post('api/materiales', 'App\Http\Controllers\MaterialController@store');
Route::put('api/materiales/{id}', 'App\Http\Controllers\MaterialController@update');
Route::delete('api/materiales/{id}', 'App\Http\Controllers\MaterialController@destroy');