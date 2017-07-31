<?php

namespace Colegio\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $primaryKey = 'dni';
    public $timestamps = false;

    protected $fillable = ['idalumno',
    					'dni',
    					'idgrado',
    					'idseccion',
    					'estado',
    					'idpadre'
    					];

    protected $guarded = [];
}
