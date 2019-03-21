<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Http\Resources\CitaResource;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index() {
        return CitaResource::collection(Cita::with('alumno')->paginate(5));
    }
    
    public function create(Request $request) {
        $cita = new Cita;
        $cita->codigo = $request->codigo;
        $cita->asunto = $request->asunto;
        $cita->fecha = $request->fecha;
        $cita->descripcion = $request->descripcion;
        $cita->estado = $request->estado;
        $cita->id_alumno = $request->id_alumno;
        $cita->codigo_alumno = $request->codigo_alumno;
        $cita->id_unayoe_perfil = $request->id_unayoe_perfil;
        
        $cita->save();
        return response()->json($cita, 200);
    }

}