{{-- resources/views/pedidos/edit.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="cliente_id" class="block text-gray-700">Cliente</label>
                        <select id="cliente_id" name="cliente_id" class="form-select w-full mt-1" required>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $pedido->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-input w-full mt-1" required>{{ $pedido->descripcion }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="estado" class="block text-gray-700">Estado</label>
                        <select id="estado" name="estado" class="form-select w-full mt-1" required>
                            <option value="Pendiente" {{ $pedido->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="En Proceso" {{ $pedido->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                            <option value="Completado" {{ $pedido->estado == 'Completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>