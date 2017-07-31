<?php

namespace Colegio\Models;

use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    protected $table = 'padre_apoderado';
    protected $primaryKey = 'dni';
    public $timestamps = false;

    protected $fillable = ['dni',
    					'cant_hijos',
    					];

    protected $guarded = [];
}
