<?php

namespace Colegio\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'idcurso';
    public $timestamps = false;

    protected $fillable = ['idcurso',
    					'nombre',
    					'nombre_corto',
    					'estado',
    					'idgrado'];

    protected $guarded = [];
}
