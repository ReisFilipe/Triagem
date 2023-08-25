<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nome_paciente');
            $table->date('Data_entrada');
            $table->time('Hora_entrada');
            $table->integer('idade');
            $table->string('Classificacao_risco');
            $table->string('origem');
            $table->boolean('samu');
            $table->string('Especialidade')->nullable();
            $table->boolean('Sintomas_gripais');
            $table->boolean('coleta_swab');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
