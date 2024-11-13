<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-2xl mb-6">Bienvenido al Sistema IMAC</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    @can('ver clientes')
                        <a href="{{ route('clientes.index') }}" class="block bg-gray-200 p-4 rounded-lg text-center hover:bg-gray-300">
                            Gestión de Clientes
                        </a>
                    @endcan

                    @can('ver materiales')
                        <a href="{{ route('materiales.index') }}" class="block bg-gray-200 p-4 rounded-lg text-center hover:bg-gray-300">
                            Gestión de Materiales
                        </a>
                    @endcan

                    @can('ver pedidos')
                        <a href="{{ route('pedidos.index') }}" class="block bg-gray-200 p-4 rounded-lg text-center hover:bg-gray-300">
                            Gestión de Pedidos
                        </a>
                    @endcan

                    @can('ver trabajos')
                        <a href="{{ route('trabajos.index') }}" class="block bg-gray-200 p-4 rounded-lg text-center hover:bg-gray-300">
                            Gestión de Trabajos
                        </a>
                    @endcan

                    @can('ver usuarios')
                        <a href="{{ route('usuarios.index') }}" class="block bg-gray-200 p-4 rounded-lg text-center hover:bg-gray-300">
                            Gestión de Usuarios
                        </a>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
