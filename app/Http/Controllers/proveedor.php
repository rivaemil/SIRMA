<?php

namespace App\Http\Controllers;

use App\Models\proveedore;
use Illuminate\Http\Request;

class proveedor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedor = proveedore::all();
        return view("proveedor", compact("provedor"));
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
        $proveedor = new proveedore;
        
        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->correo = $request->correo;
        $proveedor->direccion = $request->direccion;
        $proveedor->nombre_encargado = $request->nombre_encargado;

        $proveedor->save();
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
    public function edit(Request $request)
    {
        $proveedor = proveedore::findOrFail($request->id);

        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->correo = $request->correo;
        $proveedor->direccion = $request->direccion;
        $proveedor->nombre_encargado = $request->nombre_encargado;

        $proveedor->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $proveedor = proveedore::findOrFail($request->id);
        $proveedor->delete();
    }
}
