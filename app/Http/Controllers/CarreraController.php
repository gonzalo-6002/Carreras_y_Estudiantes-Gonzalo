<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        return response()->json(Carrera::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:100',
            'codigo' => 'required|unique:carreras,codigo',
            'facultad' => 'required',
            'duracion_semestres' => 'required|integer|between:6,14',
        ]);

        $carrera = Carrera::create($validated);
        return response()->json($carrera, 201);
    }

    public function show($id)
    {
        $carrera = Carrera::find($id);
        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }
        return response()->json($carrera, 200);
    }

    public function update(Request $request, $id)
    {
        $carrera = Carrera::find($id);
        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|max:100',
            'codigo' => 'sometimes|required|unique:carreras,codigo,' . $id,
            'facultad' => 'sometimes|required',
            'duracion_semestres' => 'sometimes|required|integer|between:6,14',
        ]);

        $carrera->update($validated);
        return response()->json($carrera, 200);
    }

    public function destroy($id)
    {
        $carrera = Carrera::find($id);
        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }

        // Criterio 6: Retorna 409 si la carrera tiene estudiantes asignados
        if ($carrera->estudiantes()->count() > 0) {
            return response()->json(['message' => 'No se puede eliminar la carrera porque tiene estudiantes matriculados'], 409);
        }

        $carrera->delete();
        return response()->json(null, 204);
    }

    // Actividad 6: Endpoint de relación exacto para la Captura 4
    public function estudiantesDeCarrera($id)
    {
        $carrera = Carrera::with('estudiantes')->find($id);
        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }
        return response()->json($carrera, 200);
    }
}
