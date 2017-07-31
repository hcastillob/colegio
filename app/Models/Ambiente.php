<?php

namespace Colegio\Models;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = 'ambiente';
    protected $primaryKey = 'idambiente';
    public $timestamps = false;

    protected $fillable = ['idambiente',
    					'nombre',
    					'capacidad',
    					'idpabellon'
    					];

    protected $guarded = [];
}
