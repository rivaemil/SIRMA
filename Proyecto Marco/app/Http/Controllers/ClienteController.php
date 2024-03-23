<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::all();
        return $clientes;
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clientes = new Clientes();
        $clientes->Nombre = $request->Nombre;
        $clientes->Correo = $request->Correo;
        $clientes->Telefono = $request->Telefono;
        $clientes->save();
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $clientes = Clientes::findOrFail($request->id);
        
        $clientes->Nombre = $request->Nombre;
        $clientes->Correo = $request->Correo;
        $clientes->Telefono = $request->Telefono;
        $clientes->save();
        return $clientes;
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $clientes = Clientes::destroy($request->id);
        return $clientes;

        //
    }
}
