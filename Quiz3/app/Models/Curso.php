<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'nombre',
        'codigo',
        'creditos',
        'carrera_id'
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}