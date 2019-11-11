<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambito extends Model
{
    protected $fillable = ['tipo'];
    public $table = 'ambito';

    public function escuelas(){
        return $this->hasMany(Escuela::class,'id');
    }
}
