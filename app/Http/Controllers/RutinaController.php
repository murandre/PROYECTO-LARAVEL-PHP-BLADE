<?php

namespace App\Http\Controllers;

use App\Models\Rutina;
use App\Models\Entrenador; // Asegúrate de importar el modelo Entrenador
use App\Models\Rutinas;
use Illuminate\Http\Request;

class RutinaController extends Controller
{
    public function index()
    {
        $rutinas = Rutinas::with('entrenador')->get();
        return view('rutinas.index', compact('rutinas'));
    }

    public function create()
    {
        $entrenadores = Entrenador::all();
        return view('rutinas.create', compact('entrenadores'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'dificultad' => 'required|string|max:255',
            'entrenador_id' => 'required|exists:entrenadores,id',
            // Agrega más reglas de validación según tus necesidades
        ]);

        $rutina = new Rutinas();

        $rutina->nombre = $request->nombre;
        $rutina->descripcion = $request->descripcion;
        $rutina->dificultad = $request->dificultad;
        $rutina->entrenador_id = $request->entrenador_id;

        $rutina->save();

        return redirect()->route('rutinas.index')->with('success', 'Rutina creada correctamente');
    }

    public function show(Rutinas $rutina)
    {
        return view('rutinas.show', compact('rutina'));
    }

    public function edit(Rutinas $rutina)
    {
        $entrenadores = Entrenador::all();
        return view('rutinas.edit', compact('rutina', 'entrenadores'));
    }

    public function update(Request $request, Rutinas $rutina)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'dificultad' => 'required|string|max:255',
            'entrenador_id' => 'required|exists:entrenadores,id',
        ]);

        $rutina->nombre = $request->nombre;
        $rutina->descripcion = $request->descripcion;
        $rutina->dificultad = $request->dificultad;
        $rutina->entrenador_id = $request->entrenador_id;

        $rutina->update();

        return redirect()->route('rutinas.index')->with('success', 'Rutina actualizada correctamente');
    }

    public function destroy(Rutinas $rutina)
    {
        $rutina->delete();
        return redirect()->route('rutinas.index')->with('success', 'Rutina eliminada correctamente');
    }
}
