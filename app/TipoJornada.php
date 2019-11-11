<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoJornada extends Model
{
    protected $fillable = ['nombreTipo'];
    public $table = 'TipoJornada';

    public function escuelas(){
        return $this->hasMany(Escuela::class,'id');
    }
}
