<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Materiales') }}
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

                @can('crear materiales')
                    <a href="{{ route('materiales.create') }}" class="btn mb-3">Agregar Material</a>
                @endcan

                <form method="GET" action="{{ route('materiales.index') }}" class="mb-4">
                    <input type="text" name="search" placeholder="Buscar material..." class="form-input w-full" value="{{ request('search') }}">
                    <button type="submit" class="btn mt-2">Buscar</button>
                </form>

                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Código</th>
                            <th class="px-4 py-2 border">Categoría</th>
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
                                <td class="border px-4 py-2">{{ $material->codigo_material }}</td>
                                <td class="border px-4 py-2">{{ $material->categoria }}</td>
                                <td class="border px-4 py-2">{{ $material->stock }}</td>
                                <td class="border px-4 py-2">{{ $material->precio }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('materiales.show', $material->id) }}" class="btn">Ver</a>

                                    @can('editar materiales')
                                        <a href="{{ route('materiales.edit', $material) }}" class="btn btn-success ml-2">Editar</a>
                                    @endcan

                                    @can('agregar stock')
                                        <a href="{{ route('stock_entries.create', $material->id) }}" class="btn btn-stock ml-2">Agregar Stock</a>
                                    @endcan

                                    @can('eliminar materiales')
                                        <form action="{{ route('materiales.destroy', $material->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ml-2">Eliminar</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($materiales->isEmpty())
                    <p class="text-center mt-4">No hay materiales disponibles.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>