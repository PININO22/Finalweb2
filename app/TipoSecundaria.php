<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSecundaria extends Model
{
    protected $fillable = ['nombreTipo'];
    public $table = 'TipoSecundaria';

    public function escuelas(){
        return $this->hasMany(Escuela::class,'id');
    }
}
