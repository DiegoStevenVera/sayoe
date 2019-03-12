<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnayoePerfilResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'profesion' => $this->profesion,
            'celular' => $this->celular,
            'foto' => $this->foto,
            'auto_descripcion' => $this->auto_descripcion,
            'facultad' => $this->facultad->nombre,
            'usuario' => $this->usuario,
            'mensaje_mes' => $this->mensajes->first()->mensaje_mes
        ]; 
    }
}