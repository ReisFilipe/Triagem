<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    use HasFactory;

    protected $table = 'classificacao';

    protected $fillable = [
        'cor',
    ];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'Classificacao_risco', 'id');
    }
}
