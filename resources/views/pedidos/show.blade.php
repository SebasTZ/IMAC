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
                <p><strong>Cliente:</strong> {{ $pedido->cliente->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $pedido->descripcion }}</p>
                <p><strong>Estado:</strong> {{ $pedido->estado }}</p>
                <a href="{{ route('pedidos.index') }}" class="btn">Volver a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>
