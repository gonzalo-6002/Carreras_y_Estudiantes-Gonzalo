<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Registrar 5 Carreras (Exigencia del examen)
        $c1 = Carrera::create([
            'nombre' => 'Ingeniería de Sistemas',
            'codigo' => 'IS01',
            'facultad' => 'Ingeniería y Arquitectura',
            'duracion_semestres' => 10
        ]);

        $c2 = Carrera::create([
            'nombre' => 'Derecho y Ciencias Políticas',
            'codigo' => 'DE02',
            'facultad' => 'Derecho',
            'duracion_semestres' => 12
        ]);

        $c3 = Carrera::create([
            'nombre' => 'Administración de Empresas',
            'codigo' => 'AD03',
            'facultad' => 'Ciencias Económicas',
            'duracion_semestres' => 10
        ]);

        $c4 = Carrera::create([
            'nombre' => 'Contabilidad',
            'codigo' => 'CO04',
            'facultad' => 'Ciencias Económicas',
            'duracion_semestres' => 10
        ]);

        $c5 = Carrera::create([
            'nombre' => 'Medicina Veterinaria',
            'codigo' => 'MV05',
            'facultad' => 'Ciencias de la Salud',
            'duracion_semestres' => 10
        ]);

        // 2. Registrar 15 Estudiantes distribuidos entre ellas (Exigencia del examen)
        // Estudiantes para Sistemas (Carrera 1)
        Estudiante::create(['carrera_id' => $c1->id, 'codigo' => 'EST01', 'nombres_apellidos' => 'Juan Perez Quispe', 'email' => 'juan@uandina.edu.pe', 'fecha_nacimiento' => '2002-05-15']);
        Estudiante::create(['carrera_id' => $c1->id, 'codigo' => 'EST02', 'nombres_apellidos' => 'Maria Flores Mamani', 'email' => 'maria@uandina.edu.pe', 'fecha_nacimiento' => '2001-09-20']);
        Estudiante::create(['carrera_id' => $c1->id, 'codigo' => 'EST03', 'nombres_apellidos' => 'Carlos Mendoza Villa', 'email' => 'carlos@uandina.edu.pe', 'fecha_nacimiento' => '2003-01-10']);

        // Estudiantes para Derecho (Carrera 2)
        Estudiante::create(['carrera_id' => $c2->id, 'codigo' => 'EST04', 'nombres_apellidos' => 'Ana Gutierrez Torres', 'email' => 'ana@uandina.edu.pe', 'fecha_nacimiento' => '2000-11-25']);
        Estudiante::create(['carrera_id' => $c2->id, 'codigo' => 'EST05', 'nombres_apellidos' => 'Luis Salas Castro', 'email' => 'luis@uandina.edu.pe', 'fecha_nacimiento' => '1999-07-14']);
        Estudiante::create(['carrera_id' => $c2->id, 'codigo' => 'EST06', 'nombres_apellidos' => 'Diana Peralta Ruiz', 'email' => 'diana@uandina.edu.pe', 'fecha_nacimiento' => '2002-03-30']);

        // Estudiantes para Administración (Carrera 3)
        Estudiante::create(['carrera_id' => $c3->id, 'codigo' => 'EST07', 'nombres_apellidos' => 'Kevin Choque Condori', 'email' => 'kevin@uandina.edu.pe', 'fecha_nacimiento' => '2001-12-05']);
        Estudiante::create(['carrera_id' => $c3->id, 'codigo' => 'EST08', 'nombres_apellidos' => 'Vanesa Ortiz Luna', 'email' => 'vanesa@uandina.edu.pe', 'fecha_nacimiento' => '2003-06-18']);
        Estudiante::create(['carrera_id' => $c3->id, 'codigo' => 'EST09', 'nombres_apellidos' => 'Ronal Ccahua Huaman', 'email' => 'ronal@uandina.edu.pe', 'fecha_nacimiento' => '2002-08-22']);

        // Estudiantes para Contabilidad (Carrera 4)
        Estudiante::create(['carrera_id' => $c4->id, 'codigo' => 'EST10', 'nombres_apellidos' => 'Gaby Vega Soria', 'email' => 'gaby@uandina.edu.pe', 'fecha_nacimiento' => '2000-02-11']);
        Estudiante::create(['carrera_id' => $c4->id, 'codigo' => 'EST11', 'nombres_apellidos' => 'Jorge Ramos Diaz', 'email' => 'jorge@uandina.edu.pe', 'fecha_nacimiento' => '2001-04-09']);
        Estudiante::create(['carrera_id' => $c4->id, 'codigo' => 'EST12', 'nombres_apellidos' => 'Sofia Palomino Paz', 'email' => 'sofia@uandina.edu.pe', 'fecha_nacimiento' => '2002-10-04']);

        // Estudiantes para Veterinaria (Carrera 5)
        Estudiante::create(['carrera_id' => $c5->id, 'codigo' => 'EST13', 'nombres_apellidos' => 'Alex Medina Valer', 'email' => 'alex@uandina.edu.pe', 'fecha_nacimiento' => '1998-08-19']);
        Estudiante::create(['carrera_id' => $c5->id, 'codigo' => 'EST14', 'nombres_apellidos' => 'Ruth Caceres Leon', 'email' => 'ruth@uandina.edu.pe', 'fecha_nacimiento' => '2001-01-29']);
        Estudiante::create(['carrera_id' => $c5->id, 'codigo' => 'EST15', 'nombres_apellidos' => 'Pedro Soto Flores', 'email' => 'pedro@uandina.edu.pe', 'fecha_nacimiento' => '2002-07-07']);
    }
}
