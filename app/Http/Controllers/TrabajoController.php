<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\Pedido;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Trabajo::class, 'trabajo');
    }

    public function index()
    {
        $trabajos = Trabajo::all();
        return view('trabajos.index', compact('trabajos'));
    }

    public function create()
    {
        $pedidos = Pedido::all();
        return view('trabajos.create', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric',
            'material_purpose' => 'required|string|max:255',
            'material_received' => 'required|boolean',
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
        $pedidos = Pedido::all();
        return view('trabajos.edit', compact('trabajo', 'pedidos'));
    }

    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric',
            'material_purpose' => 'required|string|max:255',
            'material_received' => 'required|boolean',
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