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
                <div class="mb-4">
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Agregar Nuevo Cliente</a>
                </div>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Teléfono</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="border px-4 py-2">{{ $cliente->id }}</td>
                                <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                                <td class="border px-4 py-2">{{ $cliente->telefono }}</td>
                                <td class="border px-4 py-2">{{ $cliente->email }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
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