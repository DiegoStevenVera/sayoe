<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'correo' => $this->correo,
            'contrasenha' => $this->contrasenha,
            'estado' => $this->estado,
            'autenticado' => $this->autenticado,
            'ultima_sesion' => $this->ultima_sesion,
            'id_rol' => $this->rol,
        ];
    }
}