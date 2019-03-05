<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoObservado extends Model
{

    protected $table='cursos_observados';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'nota', 'id_alumno', 
    ];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno', 'id_alumno', 'id');
    }
}
