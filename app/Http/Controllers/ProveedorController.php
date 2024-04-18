<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prov = Proveedore::all();
        return view('proveedores',compact('prov'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prov = new Proveedore;
        $prov->nombre = $request->nombre;
        $prov->correo = $request->correo;
        $prov->direccion = $request->direccion;
        $prov->telefono = $request->telefono;

        $prov->save();

        return redirect()->route('prov_index');
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
        $prov = Proveedore::findOrFail($request->id);
        return view('proveedores_edit', compact('prov'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $prov = Proveedore::findOrFail($request->id);
        $prov->nombre = $request->nombre;
        $prov->correo = $request->correo;
        $prov->direccion = $request->direccion;
        $prov->telefono = $request->telefono;

        $prov->save();

        return redirect()->route('prov_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $prov = Proveedore::findOrFail($request->id);
        $prov->delete();
        return redirect()->route('prov_index');
    }
}