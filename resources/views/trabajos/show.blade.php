<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Trabajo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <p><strong>Cliente:</strong> {{ $trabajo->cliente->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $trabajo->descripcion }}</p>
                <p><strong>Estado:</strong> {{ ucfirst($trabajo->estado) }}</p>
                <p><strong>Costo:</strong> {{ number_format($trabajo->costo, 2) }}</p>
                <p><strong>Tipo de Comprobante:</strong> {{ $trabajo->tipo_comprobante }}</p>
                <a href="{{ route('trabajos.index') }}" class="btn">Volver a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>