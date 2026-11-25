<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('carreras')->insert([
            ['id' => 1, 'nombre' => 'Ingeniería del Software'],
            ['id' => 2, 'nombre' => 'Administración de Empresas'],
            ['id' => 3, 'nombre' => 'Contabilidad']
        ]);

        DB::table('cursos')->insert([
            [
                'nombre' => 'Programación en Ambiente Web I',
                'codigo' => 'ISW-613',
                'creditos' => 3,
                'carrera_id' => 1
            ],
            [
                'nombre' => 'Base de Datos',
                'codigo' => 'BD-001',
                'creditos' => 4,
                'carrera_id' => 1
            ],
            [
                'nombre' => 'Administración General',
                'codigo' => 'ADM-001',
                'creditos' => 3,
                'carrera_id' => 2
            ],
            [
                'nombre' => 'Contabilidad Básica',
                'codigo' => 'ADC-001',
                'creditos' => 3,
                'carrera_id' => 3
            ]
        ]);
    }
}