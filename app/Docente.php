<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public $table = "Docentes";
    protected $fillable =['sexo','CUIL','Apellido','Nombre','Titulo','CategoriaTitulo'];

    public function localidad(){
        return $this->belongsTo(Localidad::class,'id_localidad');
    }

    public function plantaDocente(){
        return $this->hasMany('PlantaDocente');
    } 
}

