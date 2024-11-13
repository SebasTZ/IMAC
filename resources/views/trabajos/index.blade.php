{{-- resources/views/trabajos/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Trabajos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <a href="{{ route('trabajos.create') }}" class="btn mb-3">Agregar Trabajo</a>
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Pedido</th>
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
                                <td class="border px-4 py-2">{{ $trabajo->pedido->descripcion }}</td>
                                <td class="border px-4 py-2">{{ $trabajo->descripcion }}</td>
                                <td class="border px-4 py-2">{{ $trabajo->estado }}</td>
                                <td class="border px-4 py-2">{{ $trabajo->costo }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('trabajos.show', $trabajo->id) }}" class="text-blue-500 hover:underline">Ver</a>
                                    <a href="{{ route('trabajos.edit', $trabajo->id) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                                    <form action="{{ route('trabajos.destroy', $trabajo->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline ml-2">Eliminar</button>
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
