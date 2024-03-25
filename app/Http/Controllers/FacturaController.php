<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\factura;


class facturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::all();
        return $facturas;
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
        $factura = new Factura();
        $factura->RFC = $request->RFC;
        $factura->razon_social = $request->razon_social;
        $factura->clase_bien = $request->clase_bien;
        $factura->concepto = $request->concepto;
        $factura->descripcion = $request->descripcion;
        $factura->total = $request->total;
        
        $factura->save();
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
        $factura = Factura::findOrFail($request->id);
        $factura->RFC = $request->RFC;
        $factura->razon_social = $request->razon_social;
        $factura->clase_bien = $request->clase_bien;
        $factura->concepto = $request->concepto;
        $factura->descripcion = $request->descripcion;
        $factura->total = $request->total;
        

        $factura->save();
        return $factura;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $factura = Factura::destroy($request->id);
        return $factura;
    }
}
