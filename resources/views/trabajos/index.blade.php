<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Trabajos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                @can('crear trabajos')
                    <a href="{{ route('trabajos.create') }}" class="btn mb-3">Agregar Trabajo</a>
                @endcan

                @can('reporte trabajos')
                    <a href="{{ route('trabajos.export') }}" class="btn mb-3">Exportar a Excel</a>
                @endcan

                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Cliente</th>
                            <th class="px-4 py-2 border">Descripción</th>
                            <th class="px-4 py-2 border">Estado</th>
                            <th class="px-4 py-2 border">Costo</th>
                            <th class="px-4 py-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($trabajos as $trabajo)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2 text-center">{{ $trabajo->id }}</td>
                                <td class="border px-4 py-2">{{ $trabajo->cliente->nombre }}</td>
                                <td class="border px-4 py-2">{{ $trabajo->descripcion }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <span class="
                                        @if ($trabajo->estado === 'Pendiente') bg-yellow-200 text-yellow-700
                                        @elseif ($trabajo->estado === 'En Proceso') bg-blue-200 text-blue-700
                                        @else bg-green-200 text-green-700
                                        @endif
                                        px-2 py-1 rounded">
                                        {{ ucfirst($trabajo->estado) }}
                                    </span>
                                </td>
                                <td class="border px-4 py-2">{{ number_format($trabajo->costo, 2) }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('trabajos.show', $trabajo->id) }}" class="text-blue-500 hover:underline">Ver</a>

                                    @can('editar trabajos')
                                        <a href="{{ route('trabajos.edit', $trabajo->id) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                                    @endcan

                                    @can('eliminar trabajos')
                                        <form action="{{ route('trabajos.destroy', $trabajo->id) }}" method="POST" class="inline">
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

                @if($trabajos->isEmpty())
                    <p class="text-center mt-4">No hay trabajos disponibles.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>