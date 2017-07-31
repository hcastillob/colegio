<?php

namespace Colegio\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'dni';
    public $timestamps = false;

    protected $fillable = ['nombres',
    					'apellido_paterno',
    					'apellido_materno',
    					'direccion',
    					'fecha_nac',
    					'email',
    					'telefono',
    					'sexo',
    					'edad',
    	               ];

    protected $guarded = [];
}
