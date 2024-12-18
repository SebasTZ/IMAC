<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MaterialController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $this->authorize('viewAny', Material::class);
        $search = $request->input('search');
        $materiales = Material::query()
            ->when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%");
            })
            ->get();

        return view('materiales.index', compact('materiales'));
    }

    public function create()
    {
        $this->authorize('create', Material::class);
        return view('materiales.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Material::class);
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        Material::create($request->all());
        return redirect()->route('materiales.index')->with('success', 'Material creado exitosamente.');
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        $this->authorize('view', $material);
        \Log::info('MaterialController@show called for material: ' . $material->id);
        return view('materiales.show', compact('material'));
    }

    public function edit(string $id)
    {
        $material = Material::findOrFail($id);
        $this->authorize('update', $material);
        return view('materiales.edit', compact('material'));
    }

    public function update(Request $request, string $id)
    {
        $material = Material::find($id);
        $this->authorize('update', $material);
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $material->update($request->all());
        return redirect()->route('materiales.index')->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $material = Material::find($id);
        $this->authorize('delete', $material);
        $material->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado exitosamente.');
    }
}