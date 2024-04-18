<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('ticket', function () {
    return view('tickets');
});

Route::get('finanzas', function () {
    return view('finanzas');
});

Route::get('inventario', function () {
    return view('inventario');
});

Route::get('clientes', function () {
    return view('VistaClientes');
});


Route::controller(ProveedorController::class,)->group(function (){
    Route::get('/proveedor/index', 'index')->name('prov_index');
    Route::get('/proveedor/create', 'create')->name('prov_create');
    Route::get('/proveedor/edit/{id}', 'edit')->name('prov_edit');
    Route::get('/proveedor/destroy/{id}', 'destroy')->name('prov_destroy');
    
    Route::post('/proveedor/store', 'store')->name('prov_store');
    Route::post('/proveedor/update', 'update')->name('prov_update');

});

Route::controller(TicketController::class,)->group(function (){
    Route::get('/ticket/index', 'index')->name('prov_index');
    Route::get('/proveedor/create', 'create')->name('prov_create');
    Route::get('/proveedor/edit/{id}', 'edit')->name('prov_edit');
    Route::get('/proveedor/destroy/{id}', 'destroy')->name('prov_destroy');
    
    Route::post('/proveedor/store', 'store')->name('prov_store');
    Route::post('/proveedor/update', 'update')->name('prov_update');

});