<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Pedidos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-4">
                    <a href="{{ route('pedidos.create') }}" class="btn btn-primary">Agregar Nuevo Pedido</a>
                </div>
                <form method="GET" action="{{ route('pedidos.index') }}" class="mb-4">
                    <input type="text" name="search" placeholder="Buscar material..." class="form-input w-full" value="{{ request('search') }}">
                    <button type="submit" class="btn mt-2">Buscar</button>
                </form>
                <a href="{{ route('pedidos.export') }}" class="btn mb-3">Exportar a Excel</a>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Material</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Propósito del Material</th>
                            <th class="px-4 py-2">Material Solicitado</th>
                            <th class="px-4 py-2">Usuario que entrega el material</th>
                            <th class="px-4 py-2">Usuario que recibe el material</th>
                            <th class="px-4 py-2">Fecha del Pedido</th>
                            <th class="px-4 py-2">Fecha de la Entrega</th>
                            <th class="px-4 py-2">Observaciones de la Entrega</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td class="border px-4 py-2">{{ $pedido->id }}</td>
                                <td class="border px-4 py-2">{{ $pedido->material ? $pedido->material->nombre : 'N/A' }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <span class="
                                        @if ($pedido->estado === 'Pendiente') bg-yellow-200 text-yellow-700
                                        @elseif ($pedido->estado === 'En Proceso') bg-blue-200 text-blue-700
                                        @else bg-green-200 text-green-700
                                        @endif
                                        px-2 py-1 rounded">
                                        {{ ucfirst($pedido->estado) }}
                                    </span>
                                </td>
                                <td class="border px-4 py-2">{{ $pedido->material_purpose }}</td>
                                <td class="border px-4 py-2">{{ $pedido->material_requested ? 'Sí' : 'No' }}</td>
                                <td class="border px-4 py-2">{{ $pedido->entregaUsuario->name }}</td>
                                <td class="border px-4 py-2">{{ $pedido->recepcionUsuario->name }}</td>
                                <td class="border px-4 py-2">{{ $pedido->fecha_pedido }}</td>
                                <td class="border px-4 py-2">{{ $pedido->fecha_entrega }}</td>
                                <td class="border px-4 py-2">{{ $pedido->observaciones_entrega ? 'Sí' : 'No' }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('pedidos.show', $pedido) }}" class="btn">Ver</a>
                                    <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-success ml-2">Editar</a>
                                    <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este pedido?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>