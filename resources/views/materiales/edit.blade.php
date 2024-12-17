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
                        <label for="precio">Precio</label>
                        <input type="number" step="0.01" id="precio" name="precio" value="{{ $material->precio }}" required>
                    </div>
                    <button type="submit" class="btn">Actualizar Material</button>
                </form>
                <form action="{{ route('materiales.addStock', $material->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="stock">Agregar Stock</label>
                        <input type="number" id="stock" name="stock" required>
                    </div>
                    <button type="submit" class="btn">Agregar Stock</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>