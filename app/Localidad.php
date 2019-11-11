<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $fillable = ['Nombre','CodigoPostal'];
    public $table = 'Localidades';

    public function docentes(){
        return $this->hasMany(Docente::class,'id');
    }

    public function escuelas(){
        return $this->hasMany(Escuela::class,'id');
    }

    public function provincia(){
        return $this->belongsTo(Provincia::class,'id_provincia');
    }
}
