<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
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

                @can('crear usuarios')
                    <a href="{{ route('usuarios.create') }}" class="btn mb-3">Crear Usuario</a>
                @endcan

                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Rol</th>
                            @canany(['editar usuarios', 'eliminar usuarios'])
                                <th class="px-4 py-2 border">Acciones</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                        @foreach($usuarios as $usuario)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ $usuario->name }}</td>
                                <td class="border px-4 py-2">{{ $usuario->email }}</td>
                                <td class="border px-4 py-2">{{ $usuario->roles->pluck('name')->join(', ') }}</td>
                                @canany(['editar usuarios', 'eliminar usuarios'])
                                    <td class="border px-4 py-2 text-center">
                                        @can('editar usuarios')
                                            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-success ml-2">Editar</a>
                                        @endcan
                                        @can('eliminar usuarios')
                                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-2">Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($usuarios->isEmpty())
                    <p class="text-center mt-4">No hay usuarios disponibles.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>