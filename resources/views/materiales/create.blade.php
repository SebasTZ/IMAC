<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Nuevo Material') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('materiales.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-4">
                        <label for="categoria">Categoría</label>
                        <input type="text" id="categoria" name="categoria">
                    </div>
                    <div class="mb-4">
                        <label for="stock">Cantidad</label>
                        <input type="number" id="stock" name="stock" required>
                    </div>
                    <div class="mb-4">
                        <label for="precio">Precio</label>
                        <input type="number" step="0.01" id="precio" name="precio" required>
                    </div>
                    <button type="submit" class="btn">Guardar Material</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>