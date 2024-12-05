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
                        <label for="pedido_id">Pedido</label>
                        <select id="pedido_id" name="pedido_id" required>
                            @foreach ($pedidos as $pedido)
                                <option value="{{ $pedido->id }}" {{ $trabajo->pedido_id == $pedido->id ? 'selected' : '' }}>{{ $pedido->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="cliente_id">Cliente</label>
                        <select id="cliente_id" name="cliente_id" required>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $trabajo->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
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
                            <option value="Boleta" {{ $trabajo->tipo_comprobante == 'Boleta' ? 'selected' : '' }}>Boleta</option>
                            <option value="Factura" {{ $trabajo->tipo_comprobante == 'Factura' ? 'selected' : '' }}>Factura</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Actualizar Trabajo</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
