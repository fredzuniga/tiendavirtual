<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $fillable = ['producto_id','cantidad','importe','importe_impuesto','usuario_id','fecha_compra', 'estatus_facturacion'];

    public function productos() {
        return $this->hasOne('App\Models\Productos','id', 'producto_id');
    }

    public function usuarios() {
        return $this->hasOne('App\Models\Usuarios','id', 'usuario_id');
    }

}
