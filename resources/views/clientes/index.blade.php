<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes') }}
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

                @can('crear clientes')
                    <a href="{{ route('clientes.create') }}" class="btn mb-3">Agregar Cliente</a>
                @endcan

                <form method="GET" action="{{ route('clientes.index') }}" class="mb-4">
                    <input type="text" name="search" placeholder="Buscar cliente..." class="form-input w-full" value="{{ request('search') }}">
                    <button type="submit" class="btn mt-2">Buscar</button>
                </form>

                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Correo</th>
                            <th class="px-4 py-2 border">Teléfono</th>
                            <th class="px-4 py-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach ($clientes as $cliente)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2 text-center">{{ $cliente->id }}</td>
                                <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                                <td class="border px-4 py-2">{{ $cliente->correo }}</td>
                                <td class="border px-4 py-2">{{ $cliente->telefono }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn">Ver</a>

                                    @can('editar clientes')
                                        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-success ml-2">Editar</a>
                                    @endcan

                                    @can('eliminar clientes')
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline">
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

                @if($clientes->isEmpty())
                    <p class="text-center mt-4">No hay clientes disponibles.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>