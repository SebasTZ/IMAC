<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Material') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('materiales.update', $material->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ $material->nombre }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="categoria">Categoría</label>
                        <input type="text" id="categoria" name="categoria" value="{{ $material->categoria }}">
                    </div>
                    <div class="mb-4">
                        <label for="stock">Cantidad</label>
                        <input type="number" id="stock" name="stock" value="{{ $material->stock }}" required min="0">
                    </div>
                    <div class="mb-4">
                        <label for="precio">Precio</label>
                        <input type="number" step="0.01" id="precio" name="precio" value="{{ $material->precio }}" required min="0">
                    </div>
                    <button type="submit" class="btn">Actualizar Material</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>