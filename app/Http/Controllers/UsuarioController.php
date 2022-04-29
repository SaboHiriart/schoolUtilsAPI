<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller{
    public function index(){
        $datosUsuario = Usuario::all();
        return response()->json($datosUsuario);
    }

    public function consultar($id){
        $dataUsuarios = new Usuario;
        $datosEncontrados  = $dataUsuarios->find($id);
        return response()->json($datosEncontrados);
    }

    public function eliminar($id){
        $datosUsuario = Usuario::find($id);

        if($datosUsuario){
            $rutaArchivo = base_path('public').$datosUsuario->image_route;
            if(file_exists($rutaArchivo)){
                unlink($rutaArchivo);
            }
            $datosUsuario->delete();
        }

        return response()->json("Registro Borrado");
    }
}