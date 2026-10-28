<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';

    // Campos mínimos requeridos por el examen para asignación masiva
    protected $fillable = [
        'nombre',
        'codigo',
        'facultad',
        'duracion_semestres'
    ];

    // Relación Uno a Muchos: Una carrera tiene muchos estudiantes
    public function estudiantes(): HasMany
    {
        return $this->hasMany(Estudiante::class, 'carrera_id');
    }
}
