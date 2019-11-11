<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $fillable = ['nombre'];
    public $table = 'Provincias';

    public function localidades(){
        return $this->hasMany(Localidad::class,'id');
    }
}
