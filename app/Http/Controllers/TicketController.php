<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = Ticket::all();
        return view('tickets', compact('ticket'));
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
        $ticket = new Ticket();
        $ticket->cliente = $request->cliente;
        $ticket->vehiculo = $request->vehiculo;
        $ticket->concepto = $request->concepto;
        $ticket->descripcion = $request->descripcion;
        $ticket->total = $request->total;
        
        $ticket->save();

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = Ticket::findOrFail($request->id);
        $ticket->cliente = $request->cliente;
        $ticket->vehiculo = $request->vehiculo;
        $ticket->concepto = $request->concepto;
        $ticket->descripcion = $request->descripcion;
        $ticket->total = $request->total;

        $ticket->save();
        return $ticket;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ticket = Ticket::destroy($request->id);
        return $ticket;
    }
}
