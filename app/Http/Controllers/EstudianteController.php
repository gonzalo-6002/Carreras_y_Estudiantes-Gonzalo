<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        // Criterio 5: Devuelve la lista incluyendo el nombre de su carrera
        return response()->json(Estudiante::with('carrera')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'carrera_id' => 'required|exists:carreras,id', // Valida carrera_id inexistente
            'codigo' => 'required|unique:estudiantes,codigo',
            'nombres_apellidos' => 'required',
            'email' => 'required|email|unique:estudiantes,email',
            'fecha_nacimiento' => 'required|date',
        ]);

        $estudiante = Estudiante::create($validated);
        return response()->json($estudiante, 201); // 201 si se crea
    }

    public function show($id)
    {
        $estudiante = Estudiante::with('carrera')->find($id);
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
        return response()->json($estudiante, 200);
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        $validated = $request->validate([
            'carrera_id' => 'sometimes|required|exists:carreras,id',
            'codigo' => 'sometimes|required|unique:estudiantes,codigo,' . $id,
            'nombres_apellidos' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:estudiantes,email,' . $id,
            'fecha_nacimiento' => 'sometimes|required|date',
        ]);

        $estudiante->update($validated);
        return response()->json($estudiante, 200);
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        $estudiante->delete();
        return response()->json(null, 204); // 204 si se elimina con éxito
    }
}
