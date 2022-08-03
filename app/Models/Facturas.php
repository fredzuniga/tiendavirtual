<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;

    public function detallefactura(){
        return $this->hasMany('App\Models\DetalleFactura');
    }
}
