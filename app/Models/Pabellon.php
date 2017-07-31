<?php

namespace Colegio\Models;

use Illuminate\Database\Eloquent\Model;

class Pabellon extends Model
{
    protected $table = 'pabellon';
    protected $primaryKey = 'idpabellon';
    public $timestamps = false;

    protected $fillable = ['idpabellon',
    					'nombre',
    					'cant_amb',
    					'cant_amb_disp'
    					];

    protected $guarded = [];
}
