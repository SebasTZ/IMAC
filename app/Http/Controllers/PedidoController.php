<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Trabajo; // Correctly import the Trabajo model
use App\Models\Cliente; // Import the Cliente model
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        $trabajos = Trabajo::all(); // Fetch trabajos
        return view('pedidos.index', compact('pedidos', 'trabajos')); // Pass trabajos to the view
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'nullable|exists:clientes,id',
            'cliente_nombre' => 'required_without:cliente_id|string',
            'cliente_email' => 'required_without:cliente_id|email',
            'descripcion' => 'required|string',
            'estado' => 'required|string|max:50',
        ]);

        // Check if the client is new and create a new client record
        if (!$request->filled('cliente_id')) {
            $cliente = Cliente::create([
                'nombre' => $request->cliente_nombre,
                'email' => $request->cliente_email,
            ]);
            $request->merge(['cliente_id' => $cliente->id]);
        }

        Pedido::create($request->all());
        return redirect()->route('pedidos.index')->with('success', 'Pedido creado exitosamente.');
    }

    public function show(Pedido $pedido)
    {
        if (is_null($pedido)) {
            return redirect()->route('pedidos.index')->with('error', 'Pedido no encontrado.');
        }
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        if (is_null($pedido)) {
            return redirect()->route('pedidos.index')->with('error', 'Pedido no encontrado.');
        }
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        if (is_null($pedido)) {
            return redirect()->route('pedidos.index')->with('error', 'Pedido no encontrado.');
        }

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion' => 'required|string',
            'estado' => 'required|string|max:50',
        ]);

        $pedido->update($request->all());
        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    public function destroy(Pedido $pedido)
    {
        if (is_null($pedido)) {
            return redirect()->route('pedidos.index')->with('error', 'Pedido no encontrado.');
        }

        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
