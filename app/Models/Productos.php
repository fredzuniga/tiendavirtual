<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','precio','porcentaje_impuesto','precio_impuesto'];

    public function compras(){
        return $this->belongsTo('App\Models\Compras');
    }
}
