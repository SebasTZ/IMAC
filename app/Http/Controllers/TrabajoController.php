<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::all();
        return view('trabajos.index', compact('trabajos'));
    }

    public function create()
    {
        return view('trabajos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'descripcion' => 'required|string',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric|min:0',
        ]);

        Trabajo::create($request->all());
        return redirect()->route('trabajos.index')->with('success', 'Trabajo creado exitosamente.');
    }

    public function show(Trabajo $trabajo)
    {
        return view('trabajos.show', compact('trabajo'));
    }

    public function edit(Trabajo $trabajo)
    {
        return view('trabajos.edit', compact('trabajo'));
    }

    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'descripcion' => 'required|string',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric|min:0',
        ]);

        $trabajo->update($request->all());
        return redirect()->route('trabajos.index')->with('success', 'Trabajo actualizado exitosamente.');
    }

    public function destroy(Trabajo $trabajo)
    {
        $trabajo->delete();
        return redirect()->route('trabajos.index')->with('success', 'Trabajo eliminado exitosamente.');
    }
}
