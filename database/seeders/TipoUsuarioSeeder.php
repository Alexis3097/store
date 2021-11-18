<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuario')->insert([
            'tipo' => 'Cliente',
        ]);
        DB::table('tipo_usuario')->insert([
            'tipo' => 'Encagado',
        ]);
        DB::table('tipo_usuario')->insert([
            'tipo' => 'Contador',
        ]);
        DB::table('tipo_usuario')->insert([
            'tipo' => 'Supervisor',
        ]);
        DB::table('tipo_usuario')->insert([
            'tipo' => 'Vendedor',
        ]);

    }
}
