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
            $table->id();
            $table->string('nome_paciente');
            $table->date('Data_entrada');
            $table->time('Hora_entrada');
            $table->bigInteger('idade');
            $table->bigInteger('Classificacao_risco')->unsigned();
            $table->bigInteger('origem_paciente')->unsigned();
            $table->tinyInteger('samu');
            $table->bigInteger('Especialidade')->unsigned()->nullable();
            $table->tinyInteger('Sintomas_gripais');
            $table->tinyInteger('coleta_swab');
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->foreign('Classificacao_risco')->references('id')->on('classificacao');
            $table->foreign('origem_paciente')->references('id')->on('origem');
            $table->foreign('Especialidade')->references('id')->on('especialidade');
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
