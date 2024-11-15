{{-- resources/views/materiales/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Materiales') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                @can('crear materiales')
                    <a href="{{ route('materiales.create') }}" class="btn mb-3">Agregar Material</a>
                @endcan

                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Cantidad</th>
                            <th class="px-4 py-2 border">Precio</th>
                            <th class="px-4 py-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($materiales as $material)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2 text-center">{{ $material->id }}</td>
                                <td class="border px-4 py-2">{{ $material->nombre }}</td>
                                <td class="border px-4 py-2">{{ $material->cantidad }}</td>
                                <td class="border px-4 py-2">{{ $material->precio }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('materiales.show', $material->id) }}" class="text-blue-500 hover:underline">Ver</a>
                                    
                                    @can('editar materiales')
                                        <a href="{{ route('materiales.edit', $material->id) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                                    @endcan

                                    @can('eliminar materiales')
                                        <form action="{{ route('materiales.destroy', $material->id) }}" method="POST" class="inline">
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
            </div>
        </div>
    </div>
</x-app-layout>
