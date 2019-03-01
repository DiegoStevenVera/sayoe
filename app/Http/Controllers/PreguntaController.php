<?php

namespace App\Http\Controllers;

use DB;
use App\Pregunta;
use App\Http\Resources\PreguntaResource;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index() {
        //return PreguntaResource::collection(Pregunta::paginate(25));
        //$articles =DB::table('articles') ->join('categories', 'articles.id', '=', 'categories.id') ->join('users', 'users.id', '=', 'articles.user_id') ->select('articles.id','articles.title','articles.body','users.username', 'category.name') ->get();
        $data = DB::table('cuestionario_evaluaciones') ->join('preguntas', 'cuestionario_evaluaciones.id', '=', 'preguntas.id_cuest_eval') ->select('*') ->get();
        return response()->json($data);
    }
}