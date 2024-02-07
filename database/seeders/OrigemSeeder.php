<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrigemSeeder extends Seeder
{
    public function run()
    {
        $origens = ['DOMICÍLIO', 'OUTRO SERVIÇO', 'OUTRO MUNICIPIO', 'UPA', 'HM', 'CONSULTÓRIO'];

        foreach ($origens as $origem) {
            DB::table('origem')->insert([
                'origem' => $origem,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
