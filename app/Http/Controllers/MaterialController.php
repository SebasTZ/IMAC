<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::all();
        return view('materiales.index', compact('materiales'));
    }

    public function create()
    {
        return view('materiales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        Material::create($request->all());
        return redirect()->route('materiales.index')->with('success', 'Material creado exitosamente.');
    }

    public function show(Material $material)
    {
        return view('materiales.show', compact('material'));
    }

    public function edit(Material $material)
    {
        return view('materiales.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $material->update($request->all());
        return redirect()->route('materiales.index')->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado exitosamente.');
    }
}
