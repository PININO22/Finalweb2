<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenFails extends Model
{
    public $table = "ordenesfails";
    protected $fillable =['incumbencia','nivel','año','cargo','sexo','CUIL','apellido','nombre','titulo','categoriatitulo','localidad','cuilyear','errors'];
    
}
