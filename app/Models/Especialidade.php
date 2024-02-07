<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $table = 'especialidade';

    protected $fillable = [
        'especialidade',
    ];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'Especialidade', 'id');
    }
}
