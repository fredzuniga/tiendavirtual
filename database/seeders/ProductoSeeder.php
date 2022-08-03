<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            array(
                "nombre" => "Producto 1",
                "precio" => "123.45",
                "impuesto" => 5
            ),
            array(
                "nombre" => "Producto 2",
                "precio" => "45.65",
                "impuesto" => 15
            ),array(
                "nombre" => "Producto 3",
                "precio" => "39.73",
                "impuesto" => 12
            ),
            array(
                "nombre" => "Producto 4",
                "precio" => "250.00",
                "impuesto" => 8
            ),array(
                "nombre" => "Producto 4",
                "precio" => "59.35",
                "impuesto" => 10
            ),
            
        ];

        foreach ($array as $item) {
            DB::table('productos')->insert([
                'nombre' => $item['nombre'],
                'precio' => $item['precio'] / (1 + (5 / 100) ),
                'porcentaje_impuesto' => $item['impuesto'],
                'precio_impuesto' => $item['precio']
            ]);
        }
    }
}
