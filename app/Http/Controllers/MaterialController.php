<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialBatch;
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

        $material = Material::firstOrCreate(
            ['nombre' => $request->nombre],
            $request->only(['categoria', 'precio'])
        );

        $material->addStock($request->stock);

        return redirect()->route('materiales.index')->with('success', 'Material creado o actualizado exitosamente.');
    }

    public function show(Material $material)
    {
        $this->authorize('view', $material);
        return view('materiales.show', compact('material'));
    }

    public function edit(Material $material)
    {
        $this->authorize('update', $material);
        return view('materiales.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $this->authorize('update', $material);
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        $material->update($request->only(['nombre', 'categoria', 'precio']));

        return redirect()->route('materiales.index')->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(Material $material)
    {
        $this->authorize('delete', $material);
        $material->delete();

        return redirect()->route('materiales.index')->with('success', 'Material eliminado exitosamente.');
    }

    public function addStock(Request $request, Material $material)
    {
        $this->authorize('update', $material);
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $material->addStock($request->stock);

        return redirect()->route('materiales.show', $material)->with('success', 'Stock agregado exitosamente.');
    }
}