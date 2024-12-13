<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ $cliente->nombre }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" value="{{ $cliente->telefono }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ $cliente->email }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="tipo_documento">Tipo de Documento</label>
                        <select id="tipo_documento" name="tipo_documento" required>
                            <option value="DNI" {{ $cliente->tipo_documento == 'DNI' ? 'selected' : '' }}>DNI</option>
                            <option value="RUC" {{ $cliente->tipo_documento == 'RUC' ? 'selected' : '' }}>RUC</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="numero_documento">Número de Documento</label>
                        <input type="text" id="numero_documento" name="numero_documento" value="{{ $cliente->numero_documento }}" required>
                    </div>
                    <button type="submit" class="btn">Actualizar Cliente</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>