<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use Exception;
use Illuminate\Http\Request;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Enlace::all();
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
                '' => 'required',
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()],422);
        }

        $enlace = new Enlace();
        $enlace->enlace = $request->enlace;
        $enlace->idpagina = $request->idpagina;
        $enlace->idrol = $request->idrol;
        $enlace->descripcion = $request->descripcion;
        $enlace->usuariocreacion = $request->usuariocreacion;
        $enlace->usuariomodificacion = $request->usuariomodificacion;
        $enlace->save();
        return response()->json("Enlace guardado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enlace = Enlace::find($id);
        return response()->json($enlace);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enlace $enlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enlaces = Enlace::all();
        $enlace = $enlaces->find($id);
        $enlace = Enlace::find($id);
        $enlace->enlace = $request->enlace;
        $enlace->idpagina = $request->idpagina;
        $enlace->idrol = $request->idrol;
        $enlace->descripcion = $request->descripcion;
        $enlace->usuariocreacion = $request->usuariocreacion;
        $enlace->usuariomodificacion = $request->usuariomodificacion;
        $enlace->save();
        return response()->json("Enlace actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enlace = Enlace::find($id);
        $enlace->delete();
        return "Enlace eliminado correctamente";
    }
}
