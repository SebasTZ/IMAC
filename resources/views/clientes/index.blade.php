<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card"> <!-- Usando la clase personalizada "card" -->
                
                @can('crear clientes')
                    <a href="{{ route('clientes.create') }}" class="btn mb-3">Agregar Cliente</a> <!-- Usando la clase "btn" personalizada -->
                @endcan

                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Teléfono</th>
                            <th class="px-4 py-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($clientes as $cliente)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2 text-center">{{ $cliente->id }}</td>
                                <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                                <td class="border px-4 py-2">{{ $cliente->email }}</td>
                                <td class="border px-4 py-2">{{ $cliente->telefono }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="text-blue-500 hover:underline">Ver</a>

                                    @can('editar clientes')
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-yellow-500 hover:underline ml-2">Editar</a>
                                    @endcan

                                    @can('eliminar clientes')
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline">
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
