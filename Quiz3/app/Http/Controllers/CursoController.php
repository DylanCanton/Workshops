<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Carrera;
use App\Models\Matricula;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('carrera')->get();

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $carreras = Carrera::all();

        return view('cursos.crear', compact('carreras'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:cursos,codigo',
            'creditos' => 'required|integer|min:1',
            'carrera_id' => 'required|exists:carreras,id'
        ]);

        Curso::create($datos);

        return redirect()->route('cursos.index');
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $carreras = Carrera::all();

        return view('cursos.editar', compact('curso', 'carreras'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:cursos,codigo,' . $curso->id,
            'creditos' => 'required|integer|min:1',
            'carrera_id' => 'required|exists:carreras,id'
        ]);

        $curso->update($datos);

        return redirect()->route('cursos.index');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        if (Matricula::where('curso_id', $id)->exists()) {
            return redirect()->route('cursos.index')
                ->with('error', 'El curso tiene matrículas registradas.');
        }

        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
