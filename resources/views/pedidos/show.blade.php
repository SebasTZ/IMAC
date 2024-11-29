{{-- resources/views/pedidos/show.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="mb-4">
                    <label class="block text-gray-700">Cliente:</label>
                    <p>{{ $pedido->cliente->nombre }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Descripción:</label>
                    <p>{{ $pedido->descripcion }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Estado:</label>
                    <p>{{ $pedido->estado }}</p>
                </div>
                <a href="{{ route('pedidos.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>