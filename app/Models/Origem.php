<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origem extends Model
{
    use HasFactory;


    protected $table = 'origem';

    protected $fillable = [
        'origem',
    ];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'origem', 'id');
    }
}
