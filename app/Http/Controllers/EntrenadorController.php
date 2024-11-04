<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EntrenadorController extends Controller
{
    public function index()
    {
        $entrenadores = Entrenador::all();
        return view('entrenadores.index', compact('entrenadores'));
    }

    public function create()
    {
        $entrenador = new Entrenador();
        return view('entrenadores.create', compact('entrenador'));
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'email' => 'required|string|email|unique:entrenadores|max:255',
            'telefono' => 'required|string|max:255',
            'activo' => 'required|boolean',
        ]);

        $entrenador = new Entrenador();
        $entrenador->nombre = $validatedData['nombre'];
        $entrenador->apellido = $validatedData['apellido'];
        $entrenador->especialidad = $validatedData['especialidad'];
        $entrenador->email = $validatedData['email'];
        $entrenador->telefono = $validatedData['telefono'];
        $entrenador->activo = $request->activo;

        $entrenador->save();

        return redirect()->route('entrenadores.index')->with('success', 'Entrenador creado correctamente');
    }

    public function show(Entrenador $entrenador)
    {
        return view('entrenadores.show', compact('entrenador'));
    }

    public function edit(Entrenador $entrenador)
    {
        return view('entrenadores.edit', compact('entrenador'));
    }

    public function update(Request $request, Entrenador $entrenador)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('entrenadores')->ignore($entrenador->id),
            ],
            'telefono' => 'required|string|max:255',
            'activo' => 'required|boolean',

        ]);

        $entrenador->nombre = $validatedData['nombre'];
        $entrenador->apellido = $validatedData['apellido'];
        $entrenador->especialidad = $validatedData['especialidad'];
        $entrenador->email = $validatedData['email'];
        $entrenador->telefono = $validatedData['telefono'];
        $entrenador->activo = $request->activo;

        $entrenador->save();

        return redirect()->route('entrenadores.index')->with('success', 'Entrenador actualizado correctamente');
    }

    public function destroy(Entrenador $entrenador)
    {
        $entrenador->delete();
        return redirect()->route('entrenadores.index')->with('success', 'Entrenador eliminado correctamente');
    }
}
