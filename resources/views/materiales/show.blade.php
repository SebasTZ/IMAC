<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Material') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <p><strong>Nombre:</strong> {{ $material->nombre }}</p>
                <p><strong>Código:</strong> {{ $material->codigo_material }}</p>
                <p><strong>Categoría:</strong> {{ $material->categoria }}</p>
                <p><strong>Cantidad:</strong> {{ $material->stock }}</p>
                <p><strong>Precio:</strong> {{ $material->precio }}</p>
                <a href="{{ route('materiales.index') }}" class="btn">Volver a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>