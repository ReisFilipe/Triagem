<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'nome_paciente',
        'Data_entrada',
        'Hora_entrada',
        'idade',
        'Classificacao_risco',
        'origem',
        'samu',
        'Especialidade',
        'Sintomas_gripais',
        'coleta_swab',
        'observacao',
    ];
}
