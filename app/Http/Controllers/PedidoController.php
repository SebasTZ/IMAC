<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Material;
use App\Models\User; // Add this line
use Illuminate\Http\Request;
use App\Exports\PedidosExport;
use Maatwebsite\Excel\Facades\Excel;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pedidos = Pedido::with('material')
            ->when($search, function ($query, $search) {
                return $query->whereHas('material', function ($query) use ($search) {
                    $query->where('nombre', 'like', "%{$search}%");
                });
            })
            ->get();

        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $materiales = Material::all();
        $usuarios = User::all(); // Add this line
        return view('pedidos.create', compact('materiales', 'usuarios')); // Update this line
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'estado' => 'required|string|max:50',
            'material_purpose' => 'required|string|max:255',
            'material_requested' => 'required|boolean',
            'entrega_usuario_id' => 'required|exists:users,id', // Add this line
            'recepcion_usuario_id' => 'required|exists:users,id', // Add this line
        ]);

        $pedido = Pedido::create($request->all());

        // Disminuir el stock del material si el pedido está completado
        if ($request->estado == 'Completado') {
            $material = Material::find($request->material_id);
            $material->stock -= 1; // Ajusta la cantidad según sea necesario
            $material->save();
        }

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado exitosamente.');
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        $materiales = Material::all();
        $usuarios = User::all(); // Add this line
        return view('pedidos.edit', compact('pedido', 'materiales', 'usuarios')); // Update this line
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'estado' => 'required|string|max:50',
            'material_purpose' => 'required|string|max:255',
            'material_requested' => 'required|boolean',
            'entrega_usuario_id' => 'required|exists:users,id', // Add this line
            'recepcion_usuario_id' => 'required|exists:users,id', // Add this line
        ]);

        $pedido->update($request->all());

        // Disminuir el stock del material si el pedido está completado
        if ($request->estado == 'Completado') {
            $material = Material::find($request->material_id);
            $material->stock -= 1; // Ajusta la cantidad según sea necesario
            $material->save();
        }

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }

    public function export()
    {
        $this->authorize('report', Pedido::class);
        return Excel::download(new PedidosExport, 'pedidos.xlsx');
    }
}