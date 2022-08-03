<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('usuarios')->insert([
            'nombre' => "admin",
            'apellidos' => "user",
            'correo' => "admin@gmail.com",
            'password' => Hash::make(123456789),
            'tipo_usuario' => 1,
            'fecha_registro' => date("Y-m-d H:i:s")
        ]);
    }
}
