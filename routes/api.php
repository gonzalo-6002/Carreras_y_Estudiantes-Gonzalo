<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;

// Rutas del CRUD para Carreras (Criterio 5)
Route::apiResource('carreras', CarreraController::class);

// Actividad 6: Endpoint de relación exacto que pide el examen
Route::get('carreras/{id}/estudiantes', [CarreraController::class, 'estudiantesDeCarrera']);

// Rutas del CRUD para Estudiantes (Criterio 5)
Route::apiResource('estudiantes', EstudianteController::class);
