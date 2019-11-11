<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['nombre'];
    public $table = 'Sectores';

    public function escuelas(){
        return $this->hasMany(Escuela::class,'id');
    }
}
