<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();

        return view('matriculas.index', compact('cursos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre_estudiante' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        $matricula = Matricula::create($datos);

        return redirect()->route('matriculas.show', $matricula->id);
    }

    public function show($id)
    {
        $matricula = Matricula::with('curso.carrera')->findOrFail($id);

        return view('matriculas.detalle', compact('matricula'));
    }
}