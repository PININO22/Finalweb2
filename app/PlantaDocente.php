<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantaDocente extends Model
{
    protected $fillable = ['Curso','Horas','Division','SituacionRevista','Materia','clave']; 
    public $table = 'plantadocente';

    public function Escuela(){
        return $this->belongsTo(Escuela::class,'id_escuela');
    }

    public function docentes(){
        return $this->belongsTo(Docente::class,'id_docente');
    }
}
