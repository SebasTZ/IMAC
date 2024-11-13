<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Nuevo Cliente') }}
        </h2>
    </x-slot>

    @can('crear clientes')
        <div class="py-12 bg-gray-100">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card">
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-4">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="mb-4">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" required>
                        </div>
                        <button type="submit" class="btn">Guardar Cliente</button>
                    </form>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
