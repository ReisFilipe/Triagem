<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = ['CLINICA MÉDICA', 'ONCOLOGIA', 'NEFROLOGIA', 'CARDIOLOGIA'];

        foreach ($especialidades as $especialidade) {
            DB::table('especialidade')->insert([
                'especialidade' => $especialidade,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
