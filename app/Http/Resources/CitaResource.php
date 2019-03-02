<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CitaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'asunto' => $this->asunto,
            'fecha' => $this->fecha,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'alumno' => new AlumnoResource($this->whenLoaded('alumno')),
        ];
    }
}