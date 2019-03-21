<?php

namespace App\Http\Controllers;

use App\PerfilPsicologico;
use App\EstadoPerfil;
use App\InfoAcadem;
use App\Alumno;
use App\EscuelaProfesional;
use Illuminate\Http\Request;

class PerfilPsicologicoController extends Controller
{   
    public function create(Request $request) 
    {
        if($request->isJson()){
            $data = $request->json()->all();

            $alumnos = $data['alumnos'];
            $test = $data["test"];
            
            foreach ($alumnos as $a) {

                $perfil = PerfilPsicologico::create([
                    'fecha_limite' =>  $data["fecha_limite"],
                    'id_alumno' => Alumno::idAlumno($a['codigo']),
                ]);

                foreach ($test as $t) {
                    EstadoPerfil::create([
                        'id_perfil_psico' => $perfil->id,
                        'id_cuest_eval'=> $t['id'],                 
                    ]);
                }
            }
            
            return response()->json("listo", 200);
        }
    }
}