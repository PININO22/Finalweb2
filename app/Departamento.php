<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['numeroRegion','nombre'];
    public $table = 'Departamentos';

    public function localidades(){
        return $this->hasMany('Localidad');
    }
    public function provincia(){
        return $this->belongsTo('Provincia');
    }
}
