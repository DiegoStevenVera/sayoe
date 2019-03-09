<?php

namespace App\Http\Controllers;

use App\UnayoePerfil;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Resources\UnayoePerfilResource;
use Illuminate\Http\Request;

class UnayoePerfilController extends Controller
{

    public function index() {
        return UnayoePerfilResource::collection(UnayoePerfil::with('usuario')->paginate(25));
    }

    public function create(Request $request) {
       $perfil = new UnayoePerfil;
       $perfil->nombre = $request->nombre;
       $perfil->apellido_paterno = $request->apellido_paterno;
       $perfil->apellido_materno = $request->apellido_materno;
       $perfil->profesion = $request->profesion;
       $perfil->celular = $request->celular;

        $ruta = base_path('public') . '/img/';
        $imagenOriginal = $request->file('foto');
        $imagen = Image::make($imagenOriginal);
        $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
        $imagen->resize(300,300);
        $imagen->save($ruta . $temp_name, 100);

       $perfil->foto = $temp_name;
       $perfil->auto_descripcion = $request->auto_descripcion;
       $perfil->id_usuario = $request->id_usuario;
       $perfil->id_facultad = $request->id_facultad;
       
       $perfil->save();
       return response()->json($perfil);
    }

    public function show($id)
    {

        $perfil = UnayoePerfil::with('usuario')->where('id', $id)->get();
        return UnayoePerfilResource::collection($perfil);

        //return new UnayoePerfilResource(UnayoePerfil::find($id));
    }

    public function update(Request $request, $id)
    { 
        $perfil = UnayoePerfil::find($id);
        
        $perfil->nombre = $request->input('nombre');
        $perfil->apellido_paterno = $request->input('apellido_paterno');
        $perfil->apellido_materno = $request->input('apellido_materno');
        $perfil->profesion = $request->input('profesion');
        $perfil->celular = $request->input('celular');
        $perfil->foto = $request->input('foto');
        $perfil->auto_descripcion = $request->input('auto_descripcion');

       $perfil->save();
       return response()->json($perfil);
    }

    public function destroy($id)
    {
       $perfil = UnayoePerfil::find($id);
       $perfil->delete();
       return response()->json('Perfil removido satisfactoriamente');
    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
    
        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }
    
        return $key;
    }
}