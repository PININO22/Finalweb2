<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenDeMerito extends Model
{
    public $table = "ordenmeritos";
    protected $fillable =['incumbencia','nivel','año','cargo','sexo','CUIL','apellido','nombre','titulo','categoriatitulo','localidad','cuilyear'];
    
}
