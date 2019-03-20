<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlumnoShortResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'nombre' => $this->nombre." ".$this->apellido_materno." ".$this->apellido_paterno ,
            'escuela' => $this->escuelaProfesional->nombre,
            'situacion' => $this->infoAcadem->situacion
        ];
    }
}