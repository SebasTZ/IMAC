<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Entrada de Stock') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('stock_entries.store', $material->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" id="cantidad" name="cantidad" required min="1">
                    </div>
                    <button type="submit" class="btn">Agregar Stock</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>