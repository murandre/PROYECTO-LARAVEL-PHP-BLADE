<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipoRequest;
use App\Models\Equipo;
use App\Models\Equipos;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipos::all();
        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        $equipo = new Equipos();
        return view('equipos.create', compact('equipo'));
    }

    public function store(EquipoRequest $request)
    {
        // $validatedData = $request->validate([
        //     'nombre' => 'required|string|max:255',
        //     'descripcion' => 'required|string',
        //     'cantidad' => 'required|integer|min:1',
        //     'disponible' => 'required|boolean',
        // ]);

        $equipo = new Equipos();
        $equipo->nombre = $request->nombre;
        $equipo->descripcion = $request->descripcion;
        $equipo->cantidad = $request->cantidad;
        $equipo->disponible = $request->disponible;

        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }

    public function show(Equipos $equipo)
    {
        return view('equipos.show', compact('equipo'));
    }

    public function edit(Equipos $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipos $equipo)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'disponible' => 'required|boolean',
        ]);

        $equipo->nombre = $request->nombre;
        $equipo->descripcion = $request->descripcion;
        $equipo->cantidad = $request->cantidad;
        $equipo->disponible = $request->disponible;

        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente');
    }

    public function destroy(Equipos $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
    }
}
