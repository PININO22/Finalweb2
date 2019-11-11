<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $fillable = ['Nombre'];
    public $table = 'Niveles';

    public function escuelas(){
        return $this->hasMany(Escuela::class,'id');
    }
}
