<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Escuela extends Model
{
    protected $fillable = ['Nombre','Orientacion','Telefono','TelefonoInterno','Email','EsBilingue','CantidadAlumnos','CUE','Direccion','NivelCUE','id_usuario'];
    public $table = 'Escuelas';

    public function plantaDocente(){
        return $this->belongsTo(PlantaDocente::class);
    }

    public function TipoSecundaria(){
        return $this->belongsTo(TipoSecundaria::class,'id_tipoSecundaria');
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class,'id_categoria');
    }
    public function localidad(){
        return $this->belongsTo(Localidad::class,'id_localidad');
    }
    public function tipoEscuela(){
        return $this->belongsTo(TipoEscuela::class,'id_tipoEscuela');
    }
    public function sector(){
        return $this->belongsTo(Sector::class,'id_sector');
    }
    public function nivel(){
        return $this->belongsTo(Nivel::class,'id_nivel');
    }
    public function ambito(){
        return $this->belongsTo(Ambito::class,'id_ambito');
    }
    public function tipoJornada(){
        return $this->belongsTo(TipoJornada::class,'id_tipoJornada');
    }
    public function usuario(){
        return $this->hasOne(User::class,'id_escuela');
    }
    public function planta(){
        return $this->hasOne(PlantaDocente::class,'id');
    }
}
