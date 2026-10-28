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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('nombre', 100); // Obligatorio, máximo 100 caracteres
            $table->string('codigo')->unique(); // Obligatorio, único
            $table->string('facultad'); // Obligatorio
            $table->integer('duracion_semestres'); // Entero entre 6 y 14
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
