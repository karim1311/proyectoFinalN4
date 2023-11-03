<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Exception;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bitacora::all();
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
        try {
            $validated = $request->validate([
            'idusuario' => 'required|numeric',
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()],422);
        }
    
        $bitacora = new Bitacora();
        $bitacora->bitacora = $request->bitacora;
        $bitacora->idusuario = $request->idusuario;
        $bitacora->fecha = $request->fecha;
        $bitacora->hora = $request->hora;
        $bitacora->ip = $request->ip;
        $bitacora->so = $request->so;
        $bitacora->navegador = $request->navegador;
        $bitacora->usuario = $request->usuario;
        $bitacora->save();
        return response()->json("Bitacora guardada correctamente");
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bitacora = Bitacora::find($id);
        return response()->json($bitacora);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bitacora $bitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bitacoras = Bitacora::all();
        $bitacora = $bitacoras->find($id);
        $bitacora->bitacora = $request->bitacora;
        $bitacora->idusuario = $request->idusuario;
        $bitacora->fecha = $request->fecha;
        $bitacora->hora = $request->hora;
        $bitacora->ip = $request->ip;
        $bitacora->so = $request->so;
        $bitacora->navegador = $request->navegador;
        $bitacora->usuario = $request->usuario;
        $bitacora->save();
        return response()->json("Bitacora actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bitacora = Bitacora::find($id);
        $bitacora->delete();
        return "Bitacora eliminada correctamente";
    }
}
