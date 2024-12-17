/resources/views/trabajos/edit.blade.php
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Trabajo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('trabajos.update', $trabajo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="cliente_id">Cliente</label>
                        <select id="cliente_id" name="cliente_id" required>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $trabajo->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('clientes.create') }}" class="btn btn-secondary mt-2">Agregar Nuevo Cliente</a>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" required>{{ $trabajo->descripcion }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" required>
                            <option value="Pendiente" {{ $trabajo->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="En Proceso" {{ $trabajo->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                            <option value="Completado" {{ $trabajo->estado == 'Completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="costo">Costo</label>
                        <input type="number" step="0.01" id="costo" name="costo" value="{{ $trabajo->costo }}" required min="0">
                    </div>
                    <div class="mb-4">
                        <label for="tipo_comprobante">Tipo de Comprobante</label>
                        <select id="tipo_comprobante" name="tipo_comprobante" required>
                            <option value="Ninguno" {{ $trabajo->tipo_comprobante == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                            <option value="Boleta" {{ $trabajo->tipo_comprobante == 'Boleta' ? 'selected' : '' }}>Boleta</option>
                            <option value="Factura" {{ $trabajo->tipo_comprobante == 'Factura' ? 'selected' : '' }}>Factura</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="material_purpose">Propósito del Material</label>
                        <input type="text" id="material_purpose" name="material_purpose" value="{{ $trabajo->material_purpose }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="material_received">Material Recibido</label>
                        <select id="material_received" name="material_received" required>
                            <option value="1" {{ $trabajo->material_received ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ !$trabajo->material_received ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="trabajo_usuario_id">Usuario que realiza el trabajo</label>
                        <select id="trabajo_usuario_id" name="trabajo_usuario_id" required>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" {{ $trabajo->trabajo_usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn">Actualizar Trabajo</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>