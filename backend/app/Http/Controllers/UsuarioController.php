<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    function login (Request $req)
    {
        $correo = $req->input('correo');
        $clave = $req->input('clave');

        $usuario = DB::table('usuarios')->where('correo',$correo)->first();

        //$password =  "admin"
        if (!Hash::check($clave, $usuario->clave)) 
        {
            echo "Not matched";    
        }
        else
        {
            echo $usuario->correo;
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'correo' => 'required|email',
                'clave' => 'required'
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()],422);
        }
    
        $usuario = new Usuario();
        $usuario->idpersona = $request->idpersona;
        $usuario->usuario = $request->usuario;
        $usuario->correo = $request->correo;
        $usuario->clave = $request->clave;
        $usuario->habilitado = $request->habilitado;
        $usuario->fecha = $request->fecha;
        $usuario->idrol = $request->idrol;
        $usuario->usuariocreacion = $request->usuariocreacion;
        $usuario->usuariomodificacion = $request->usuariomodificacion;
        $usuario->save();
        return response()->json("Usuario guardado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        return response()->json($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
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
                'correo' => 'required|email'
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()],422);
        }
    
        $usuarios = Usuario::all();
        $usuario = $usuarios->find($id);
        $usuario->idpersona = $request->idpersona;
        $usuario->usuario = $request->usuario;
        $usuario->correo = $request->correo;
        $usuario->clave = $request->clave;
        $usuario->habilitado = $request->habilitado;
        $usuario->fecha = $request->fecha;
        $usuario->idrol = $request->idrol;
        $usuario->usuariocreacion = $request->usuariocreacion;
        $usuario->usuariomodificacion = $request->usuariomodificacion;
        $usuario->save();
        return response()->json("Usuario actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return "Usuario eliminado correctamente";
    }
}
