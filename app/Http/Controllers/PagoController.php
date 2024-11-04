<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Pagos;
use App\Models\Socio;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pagos::all();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $socios = Socio::all();
        return view('pagos.create', compact('socios'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:255',
            'confirmado' => 'required|boolean',
            'socio_id' => 'required|exists:socios,id',
        ]);

        $pago = new Pagos();
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->metodo_pago = $request->metodo_pago;
        $pago->confirmado = $request->confirmado;
        $pago->socio_id = $request->socio_id;

        $pago->save();

        return redirect()->route('pagos.index')->with('success', 'Pago creado correctamente');
    }

    public function show(Pagos $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    public function edit(Pagos $pago)
    {
        $socios = Socio::all();
        return view('pagos.edit', compact('pago', 'socios'));
    }

    public function update(Request $request, Pagos $pago)
    {
        $validatedData = $request->validate([
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:255',
            'confirmado' => 'required|boolean',
            'socio_id' => 'required|exists:socios,id',
        ]);

        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->metodo_pago = $request->metodo_pago;
        $pago->confirmado = $request->confirmado;
        $pago->socio_id = $request->socio_id;

        $pago->save();

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente');
    }

    public function destroy(Pagos $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente');
    }
}
