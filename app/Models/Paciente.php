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
        'origem_paciente',
        'samu',
        'Especialidade',
        'Sintomas_gripais',
        'coleta_swab',
        'observacao',
    ];


    public function classificacao()
    {
        return $this->belongsTo(Classificacao::class, 'Classificacao_risco', 'id');
    }

    public function origem()
    {
        return $this->belongsTo(Origem::class, 'origem_paciente', 'id');
    }

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class, 'Especialidade', 'id');
    }
}
