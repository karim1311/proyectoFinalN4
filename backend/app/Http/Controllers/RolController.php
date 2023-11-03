<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Exception;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rol::all();
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
            'rol' => 'required',
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()],422);
        }
    
        $rol = new Rol();
        $rol->rol = $request->rol;
        $rol->usuariocreacion = $request->usuariocreacion;
        $rol->usuariomodificacion = $request->usuariomodificacion;
        $rol->save();
        return response()->json("Rol guardado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Rol::find($id);
        return response()->json($rol);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
            'rol' => 'required',
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()],422);
        }
    
        $roles = Rol::all();
        $rol = $roles->find($id);
        $rol->rol = $request->rol;
        $rol->usuariocreacion = $request->usuariocreacion;
        $rol->usuariomodificacion = $request->usuariomodificacion;
        $rol->save();
        return response()->json("Rol actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Rol::find($id);
        $rol->delete();
        return "Rol eliminado correctamente";
    }
}
