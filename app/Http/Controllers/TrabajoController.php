<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\Pedido;
use App\Models\Cliente;
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
        $clientes = Cliente::all(); // Obtener clientes
        return view('trabajos.create', compact('pedidos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'cliente_id' => 'required|exists:clientes,id', // Validar cliente
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric',
            'material_purpose' => 'required|string|max:255',
            'material_received' => 'required|boolean',
            'tipo_comprobante' => 'required|string|max:50', // Validar tipo de comprobante
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
        $clientes = Cliente::all(); // Obtener clientes
        return view('trabajos.edit', compact('trabajo', 'pedidos', 'clientes'));
    }

    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'cliente_id' => 'required|exists:clientes,id', // Validar cliente
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric',
            'material_purpose' => 'required|string|max:255',
            'material_received' => 'required|boolean',
            'tipo_comprobante' => 'required|string|max:50', // Validar tipo de comprobante
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