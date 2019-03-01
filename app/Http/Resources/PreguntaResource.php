<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PreguntaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            //'cuestionarioEvaluacion' => $this->cuestionarioEvaluacion,
            'id'=>$this->id,
            'pregunta' => $this->pregunta,
            'alternativas' => $this->alternativas
        ];
    }
}