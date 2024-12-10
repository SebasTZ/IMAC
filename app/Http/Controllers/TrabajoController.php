<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\Cliente;
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
        return view('trabajos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric|min:0',
            'tipo_comprobante' => 'required|string|max:50',
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
        return view('trabajos.edit', compact('trabajo', 'clientes'));
    }

    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:50',
            'costo' => 'required|numeric|min:0',
            'tipo_comprobante' => 'required|string|max:50',
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