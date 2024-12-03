<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @can('ver usuarios')
                    <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                    <p><strong>Email:</strong> {{ $usuario->email }}</p>
                    <p><strong>Rol:</strong> {{ $usuario->roles->pluck('name')->join(', ') }}</p>
                    <a href="{{ route('usuarios.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4">Volver a la lista</a>
                @else
                    <p>No tienes permiso para ver esta información.</p>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>