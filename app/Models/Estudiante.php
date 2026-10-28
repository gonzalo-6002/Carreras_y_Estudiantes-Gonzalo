<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    // Campos mínimos requeridos por el examen para asignación masiva
    protected $fillable = [
        'carrera_id',
        'codigo',
        'nombres_apellidos',
        'email',
        'fecha_nacimiento'
    ];

    // Relación Inversa: Un estudiante pertenece a una sola carrera
    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}
