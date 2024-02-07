<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificacaoSeeder extends Seeder
{
    public function run()
    {
        $cores = ['VERDE', 'AMARELO', 'VERMELHO', 'LARANJA', 'AZUL', 'BRANCO'];

        foreach ($cores as $cor) {
            DB::table('classificacao')->insert([
                'cor' => $cor,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

