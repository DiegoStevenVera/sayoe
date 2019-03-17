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
            'facebook' => $this->facebook,
            'celular' => $this->celular,
            'correo' => $this->correo,
            'wsp' => $this->wsp,
            'foto' => $this->foto,
            'auto_descripcion' => $this->auto_descripcion,
            'facultad' => $this->facultad->nombre,
            'usuario' => $this->usuario,
        ]; 
    }
}
