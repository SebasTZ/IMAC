{{-- resources/views/pedidos/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                @can('crear pedidos')
                    <a href="{{ route('pedidos.create') }}" class="btn mb-3">Agregar Pedido</a>
                @endcan

                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Cliente</th>
                            <th class="px-4 py-2 border">Descripción</th>
                            <th class="px-4 py-2 border">Estado</th>
                            <th class="px-4 py-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($pedidos as $pedido)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2 text-center">{{ $pedido->id }}</td>
                                <td class="border px-4 py-2">{{ $pedido->cliente->nombre }}</td>
                                <td class="border px-4 py-2">{{ $pedido->descripcion }}</td>
                                <td class="border px-4 py-2">{{ ucfirst($pedido->estado) }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('pedidos.show', $pedido->id) }}" class="text-blue-500 hover:underline">Ver</a>

                                    @can('editar pedidos')
                                        <a href="{{ route('pedidos.edit', $pedido->id) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                                    @endcan

                                    @can('eliminar pedidos')
                                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline ml-2">Eliminar</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($pedidos->isEmpty())
                    <p class="text-center mt-4">No hay pedidos disponibles.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
</write_to_file>
