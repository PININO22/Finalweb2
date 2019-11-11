<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEscuela extends Model
{
    protected $fillable = ['nombreTipo'];
    public $table = 'TipoEscuela';

    public function escuelas(){
        return $this->hasMany(Escuela::class,'id');
    }
}
