<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use Exception;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pagina::all();
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
            'nombre' => 'required',
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()],422);
        }
    
        $pagina = new Pagina();
        $pagina->usuariocreacion = $request->usuariocreacion;
        $pagina->usuariomodificacion = $request->usuariomodificacion;
        $pagina->url = $request->url;
        $pagina->estado = $request->estado;
        $pagina->nombre = $request->nombre;
        $pagina->descripcion = $request->descripcion;
        $pagina->icono = $request->icono;
        $pagina->tipo = $request->tipo;
        $pagina->save();
        return response()->json("Pagina guardada correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pagina = Pagina::find($id);
        return response()->json($pagina);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pagina $pagina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paginas = Pagina::all();
        $pagina = $paginas->find($id);
        $pagina->usuariocreacion = $request->usuariocreacion;
        $pagina->usuariomodificacion = $request->usuariomodificacion;
        $pagina->url = $request->url;
        $pagina->estado = $request->estado;
        $pagina->nombre = $request->nombre;
        $pagina->descripcion = $request->descripcion;
        $pagina->icono = $request->icono;
        $pagina->tipo = $request->tipo;
        $pagina->save();
        return response()->json("Pagina actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pagina = Pagina::find($id);
        $pagina->delete();
        return "Pagina eliminada correctamente";
    }
}
