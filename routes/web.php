<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix'=>'api/v1'], function() use($router){

    //AUTH
    $router->post(
        'auth/login', 
        [
        'uses' => 'AuthController@authenticate'
        ]
    );        

    $router->group(['middleware' => 'jwt.auth'], function($router) {
        // FACULTADES
        $router->get('/facultades', 'FacultadController@index');
        $router->post('/facultad', 'FacultadController@create');
        $router->get('/facultad/{id}', 'FacultadController@show');
        $router->put('/facultad/{id}', 'FacultadController@update');
        $router->delete('/facultad/{id}', 'FacultadController@destroy');

        //PERFILES UNAYOE
        $router->get('/unayoe-perfiles', 'UnayoePerfilController@index');
        $router->post('/unayoe-perfil', 'UnayoePerfilController@create');
        $router->get('/unayoe-perfil/{id}', 'UnayoePerfilController@show');
        $router->put('/unayoe-perfil/{id}', 'UnayoePerfilController@update');
        $router->delete('/unayoe-perfil/{id}', 'UnayoePerfilController@destroy');

        //CUESTIONARIO EVALUACION
        $router->get('/cuestionario-evaluaciones', 'CuestionarioEvaluacionController@index');
        $router->get('/cuestionario-evaluacion/{id}', 'CuestionarioEvaluacionController@show');

        //CITAS
        $router->get('/citas', 'CitaController@index');
        $router->post('/cita', 'CitaController@create');

        //ALUMNOS
        $router->get('/alumnoShort/{id}', 'AlumnoController@shortAlumno');
        
        //CREAR PERFIL_PSICOLOGICO, ESTADO_PERFIL
        $router->post('/asignarAlumno', 'PerfilPsicologicoController@create');
        $router->post('/asignarGrupo', 'PerfilPsicologicoController@createGroup');
    });    
});

