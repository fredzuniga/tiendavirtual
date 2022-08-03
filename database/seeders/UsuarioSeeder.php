<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('usuarios')->insert([
            'nombre' => "user",
            'apellidos' => "test",
            'correo' => "test@gmail.com",
            'password' => Hash::make(123456789),
            'tipo_usuario' => 2,
            'fecha_registro' => date("Y-m-d H:i:s")
        ]);
    }
}
