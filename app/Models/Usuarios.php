<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuarios extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = ['nombre','apellidos','correo','password','fecha_registro','tipo_usuario'];

    public function compras(){
        return $this->belongsTo('App\Models\Compras','clave_foranea', 'clave_local_a_relacionar');
    }
}
