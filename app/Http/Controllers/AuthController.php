<?php

namespace App\Http\Controllers;

use Validator;
use App\Usuario;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthController extends BaseController 
{
    private $request;
    
    public function __construct(Request $request) {
        $this->request = $request;
    }
    
    protected function jwt(Usuario $user) {
        $payload = [
            'iss' => "lumen-jwt", 
            'sub' => $user->id, 
            'nombre' => $this->primerNombre($user->unayoePerfil->nombre),
            'apellido' => $user->unayoePerfil->apellido_paterno,
            'foto' => $user->unayoePerfil->foto,
            'rol' => $user->rol,
            'iat' => time(), 
            'exp' => time() + 60*60 
        ];
        return JWT::encode($payload, env('JWT_SECRET'));
    } 
    
    public function authenticate(Usuario $user) {
        $this->validate($this->request, [
            'correo'     => 'required|email',
            'contrasenha'  => 'required'
        ]);
        
        $user = Usuario::where('correo', $this->request->input('correo'))->first();
        if (!$user) {
            return response()->json([
                'error' => 'Email does not exist.'
            ], 400);
        }
        
        if (Hash::check($this->request->input('contrasenha'), $user->contrasenha)) {
            $user->ultima_sesion = new \DateTime();
            $user->save();
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        }
        
        return response()->json([
            'error' => 'Email or password is wrong.'
        ], 400);
    }

    public function register(Request $request)
    {
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        //lumen dont have bcrypt
        //'contrasenha' => app('hash')->make('12345'),
        'password' => bcrypt($request->password),
      ]);

      $token = auth()->login($user);

      return $this->respondWithToken($token);
    }

    public function primerNombre ($nombres){
        $nombre= '';
        for($i=0 ; $i< strlen($nombres); $i++){
            if($nombres{$i} == ' '){
                return $nombre;
            }
            $nombre = $nombre.$nombres{$i};
        }
        return $nombre;
    }
}