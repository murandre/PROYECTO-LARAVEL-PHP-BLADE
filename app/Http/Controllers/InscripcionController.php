<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Inscripciones;
use App\Models\Socio;
use App\Models\v_inscripcion_detalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripciones::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

    public function create()
    {
        $socios = Socio::all();
        return view('inscripciones.create', compact('socios'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'tipo' => 'required|string|max:255',
            'activo' => 'required|boolean',
            'socio_id' => 'required|exists:socios,id',
        ]);

        $inscripcion = new Inscripciones();
        $inscripcion->fecha_inicio = $request->fecha_inicio;
        $inscripcion->fecha_fin = $request->fecha_fin;
        $inscripcion->tipo = $request->tipo;
        $inscripcion->activo = $request->activo;
        $inscripcion->socio_id = $request->socio_id;

        $inscripcion->save();

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción creada correctamente');
    }

    public function show(Inscripciones $inscripcion)
    {
        return view('inscripciones.show', compact('inscripcion'));
    }

    public function edit(Inscripciones $inscripcion)
    {
        $socios = Socio::all();
        return view('inscripciones.edit', compact('inscripcion', 'socios'));
    }

    public function update(Request $request, Inscripciones $inscripcion)
    {
        $validatedData = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'tipo' => 'required|string|max:255',
            'activo' => 'required|boolean',
            'socio_id' => 'required|exists:socios,id',
        ]);

        $inscripcion->fecha_inicio = $request->fecha_inicio;
        $inscripcion->fecha_fin = $request->fecha_fin;
        $inscripcion->tipo = $request->tipo;
        $inscripcion->activo = $request->activo;
        $inscripcion->socio_id = $request->socio_id;

        $inscripcion->save();

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción actualizada correctamente');
    }

    public function destroy(Inscripciones $inscripcion)
    {
        $inscripcion->delete();
        return redirect()->route('inscripciones.index')->with('success', 'Inscripción eliminada correctamente');
    }

    // Nueva función para acceder a los detalles de inscripciones desde la vista v_inscripcion_detalle
    public function v_inscripcion_detalle()
    {
        $v_inscripciones_detalle = v_inscripcion_detalle::all(); // Obtén todos los registros de la vista
        return view('inscripciones.v_inscripcion_detalle', compact('v_inscripciones_detalle')); // Cambiado a 'v_inscripciones_detalle'
    }

    public function v_inscripciones_detalle_eloquent_sin_model()
    {
        $v_inscripciones_detalle = Inscripciones::select(
            'inscripciones.id',
            'inscripciones.fecha_inicio',
            'inscripciones.fecha_fin',
            'inscripciones.tipo',
            'inscripciones.activo',
            'socios.nombre',
            'socios.apellido',
            'socios.id'
        )
        ->join('socios', 'socios.id', '=', 'inscripciones.socio_id') // Corregido 'socio' a 'socios'
        ->get();

        return view('inscripciones.v_inscripcion_detalle', compact('v_inscripciones_detalle')); // Cambiado a 'v_inscripciones_detalle'
    }

    public function v_inscripciones_detalle_querybuilder_1()
    {
        $v_inscripciones_detalle = DB::table('inscripciones')
            ->join('socios', 'socios.id', '=', 'inscripciones.socio_id') // Corregido 'socio' a 'socios'
            ->select(
                'inscripciones.id',
                'inscripciones.fecha_inicio',
                'inscripciones.fecha_fin',
                'inscripciones.tipo',
                'inscripciones.activo',
                'socios.nombre',
                'socios.apellido',
                'socios.id'
            )
            ->get();

            return view('inscripciones.v_inscripcion_detalle', compact('v_inscripciones_detalle')); // Cambiado a 'v_inscripciones_detalle'
        }

    public function v_inscripciones_detalle_querybuilder_2()
    {
        $v_inscripciones_detalle = DB::select("
            SELECT ins.id, ins.fecha_inicio, ins.fecha_fin, ins.tipo, ins.activo, so.nombre, so.apellido
            FROM gestion_gimnasio.inscripciones ins
            INNER JOIN gestion_gimnasio.socios so ON so.id = ins.socio_id
            WHERE ins.socio_id IS NOT NULL;
        ");

        return view('inscripciones.v_inscripcion_detalle', compact('v_inscripciones_detalle')); // Cambiado a 'v_inscripciones_detalle'
    }

    public function v_inscripciones_detalle_con_model()
    {
        $v_inscripciones_detalle = Inscripciones::with(['socio'])->get();

        dd($v_inscripciones_detalle);

        return view('inscripciones.v_inscripcion_detalle', compact('v_inscripciones_detalle')); // Cambiado a 'v_inscripciones_detalle'
    }
    



    
}
