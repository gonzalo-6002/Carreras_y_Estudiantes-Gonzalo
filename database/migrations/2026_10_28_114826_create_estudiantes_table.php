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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->foreignId('carrera_id')->constrained('carreras'); // Llave foránea hacia carreras
            $table->string('codigo')->unique(); // Obligatorio, único
            $table->string('nombres_apellidos'); // Obligatorios
            $table->string('email')->unique(); // Obligatorio, formato email, único
            $table->date('fecha_nacimiento'); // Fecha válida
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
