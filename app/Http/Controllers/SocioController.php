<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocioRequest;
use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SocioController extends Controller
{
    public function index()
    {
        $socios = Socio::all();
        return view('socios.index', compact('socios'));
    }

    public function create()
    {
        $socio = new Socio();
        return view('socios.create', compact('socio'));
    }

    public function store(SocioRequest $request)
    {
        // $validatedData = $request->validate([
        //     'nombre' => 'required|string|max:255',
        //     'apellido' => 'required|string|max:255',
        //     'fecha_nacimiento' => 'required|date',
        //     'email' => 'required|string|email|unique:socios|max:255',
        //     'telefono' => 'required|string|max:255',
        //     'direccion' => 'required|string|max:255',
        //     'activo' => 'required|boolean',
        // ]);

        $socio = new Socio();
        $socio->nombre = $request['nombre'];
        $socio->apellido = $request['apellido'];
        $socio->fecha_nacimiento = $request['fecha_nacimiento'];
        $socio->email = $request['email'];
        $socio->telefono = $request['telefono'];
        $socio->direccion = $request['direccion'];
        $socio->activo = $request->activo;


        $socio->save();

        return redirect()->route('socios.index')->with('success', 'Socio creado correctamente');
    }

    public function show(Socio $socio)
    {
        return view('socios.show', compact('socio'));
    }

    public function edit(Socio $socio)
    {
        return view('socios.edit', compact('socio'));
    }

    public function update(Request $request, Socio $socio)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('socios')->ignore($socio->id),
            ],
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'activo' => 'required|boolean',

        ]);

        $socio->nombre = $validatedData['nombre'];
        $socio->apellido = $validatedData['apellido'];
        $socio->fecha_nacimiento = $validatedData['fecha_nacimiento'];
        $socio->email = $validatedData['email'];
        $socio->telefono = $validatedData['telefono'];
        $socio->direccion = $validatedData['direccion'];
        $socio->activo = $request->activo;


        $socio->save();

        return redirect()->route('socios.index')->with('success', 'Socio actualizado correctamente');
    }

    public function destroy(Socio $socio)
    {
        $socio->delete();
        return redirect()->route('socios.index')->with('success', 'Socio eliminado correctamente');
    }
}
