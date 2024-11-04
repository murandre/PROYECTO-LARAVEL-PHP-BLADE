<?php

namespace App\Http\Controllers\Api;

use App\Models\Socio;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ApiSocioController extends Controller
{
    public function index()
    {
        $socios = Socio::all();

        return response()->json($socios, 201);

        //return Socio::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|unique:socios,email',
            'tipo_socio' => 'required|string|max:50',
        ]);

        $socio = Socio::create($validatedData);

        return response()->json($socio, 201);
    }

    public function show($id)
    {
        $socio = Socio::findOrFail($id);
        return response()->json($socio);
    }

    public function update(Request $request, $id)
    {
        $socio = Socio::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'direccion' => 'string|max:255',
            'telefono' => 'string|max:15',
            'email' => 'email|unique:socios,email,'.$socio->id,
            'tipo_socio' => 'string|max:50',
        ]);

        $socio->update($validatedData);

        return response()->json($socio);
    }

    public function destroy($id)
    {
        $socio = Socio::findOrFail($id);
        $socio->delete();

        return response()->json(null, 204);
    }
}