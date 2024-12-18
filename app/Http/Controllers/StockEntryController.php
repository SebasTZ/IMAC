<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\StockEntry;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    public function create(Material $material)
    {
        $this->authorize('addStock', Material::class);
        return view('materiales.add', compact('material'));
    }

    public function store(Request $request, Material $material)
    {
        $this->authorize('addStock', Material::class);
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        StockEntry::create([
            'material_id' => $material->id,
            'cantidad' => $request->input('cantidad'),
        ]);

        $material->increment('stock', $request->input('cantidad'));

        return redirect()->route('materiales.show', $material)->with('success', 'Stock actualizado exitosamente.');
    }
}