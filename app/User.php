<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nombre','apellido','Nick','email','password','remember_token','rol'];
    protected $hidden = ['password'];
    public $table = 'users';
    
    public function escuelas(){
        return $this->belongsTo(Escuela::class,'id_escuela');
    }
}
