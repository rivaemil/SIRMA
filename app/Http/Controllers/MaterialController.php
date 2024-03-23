<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;


class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = Material::all();
        return $materiales;
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
        $material = new Material();
        $material->nombre = $request->nombre;
        $material->cantidad = $request->cantidad;
        $material->proveedor = $request->proveedor;
        $material->descripcion = $request->descripcion;
        
        $material->save();
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
        $material = Material::findOrFail($request->id);
        $material->nombre = $request->nombre;
        $material->cantidad = $request->cantidad;
        $material->proveedor = $request->proveedor;
        $material->descripcion = $request->descripcion;
        

        $material->save();
        return $material;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $material = Material::destroy($request->id);
        return $material;
    }
}
