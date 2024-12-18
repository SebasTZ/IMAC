<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\Cliente;
use App\Models\User; // Add this line
use Illuminate\Http\Request;
use App\Exports\TrabajosExport;
use Maatwebsite\Excel\Facades\Excel;

class TrabajoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Trabajo::class, 'trabajo');
    }

    public function index()
    {
        $trabajos = Trabajo::with('cliente')->get();
        return view('trabajos.index', compact('trabajos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $usuarios = User::all(); // Add this line
        return view('trabajos.create', compact('clientes', 'usuarios')); // Update this line
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric|min:0',
            'tipo_comprobante' => 'required|string|max:50',
            'material_purpose' => 'required|string|max:255',
            'material_received' => 'required|boolean',
            'trabajo_usuario_id' => 'required|exists:users,id',
            'fecha_ingreso' => 'required|date', // Add this line
            'fecha_culminacion' => 'nullable|date', // Add this line
            'observaciones' => 'required|boolean', // Add this line
            'observacion_texto' => 'nullable|string', // Add this line
            'conformidad_cliente' => 'required|boolean', // Add this line
            'conformidad_texto' => 'nullable|string', // Add this line
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
        $clientes = Cliente::all();
        $usuarios = User::all(); // Add this line
        return view('trabajos.edit', compact('trabajo', 'clientes', 'usuarios')); // Update this line
    }

    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric|min:0',
            'tipo_comprobante' => 'required|string|max:50',
            'material_purpose' => 'required|string|max:255',
            'material_received' => 'required|boolean',
            'trabajo_usuario_id' => 'required|exists:users,id', // Add this line
            'fecha_ingreso' => 'required|date', // Add this line
            'fecha_culminacion' => 'nullable|date', // Add this line
            'observaciones' => 'required|boolean', // Add this line
            'observacion_texto' => 'nullable|string', // Add this line
            'conformidad_cliente' => 'required|boolean', // Add this line
            'conformidad_texto' => 'nullable|string', // Add this line
        ]);

        $trabajo->update($request->all());
        return redirect()->route('trabajos.index')->with('success', 'Trabajo actualizado exitosamente.');
    }

    public function destroy(Trabajo $trabajo)
    {
        $trabajo->delete();
        return redirect()->route('trabajos.index')->with('success', 'Trabajo eliminado exitosamente.');
    }

    public function export()
    {
        $this->authorize('report', Trabajo::class);
        return Excel::download(new TrabajosExport, 'trabajos.xlsx');
    }
}