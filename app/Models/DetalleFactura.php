<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    public function facturas(){
        return $this->belongsTo('App\Models\Facturas','factura_id', 'id');
    }

    public function compras(){
        return $this->belongsTo('App\Models\Compras','compra_id', 'id');
    }
}
