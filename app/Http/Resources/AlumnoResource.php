<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlumnoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'apellido_p' => $this->apellido_paterno,
            'apellido_m' => $this->apellido_materno,
            'dni' => $this->dni,
            'sexo' => $this->sexo,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'direccion' => $this->direccion,
            'correo_personal' => $this->correo_personal,
            'escuela' => $this->escuelaProfesional,
        ];
    }
}