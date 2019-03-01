<?php

namespace App\Http\Controllers;

use App\CuestionarioEvaluacion;
use App\Http\Resources\CuestionarioEvaluacionResource;
use Illuminate\Http\Request;

class CuestionarioEvaluacionController extends Controller
{
    public function index() {
        //return UsersResource::collection($user->with('posts')->paginate());
        return CuestionarioEvaluacionResource::collection(CuestionarioEvaluacion::with('preguntas')->paginate(25));
    }

    public function show($id) {
        $cuestionario = CuestionarioEvaluacion::with('preguntas')->where('id', $id)->get();
        return CuestionarioEvaluacionResource::collection($cuestionario);
    }
}