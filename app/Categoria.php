<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['tipo'];
    public $table = 'Categorias';

    public function escuelas(){
        return $this->hasMany(Escuela::class,'id');
    }
}
