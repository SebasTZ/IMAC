{{-- resources/views/pedidos/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Nuevo Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('pedidos.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="cliente_id" class="block text-gray-700">Cliente</label>
                        <select id="cliente_id" name="cliente_id" class="form-select w-full mt-1" required>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-input w-full mt-1" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="estado" class="block text-gray-700">Estado</label>
                        <select id="estado" name="estado" class="form-select w-full mt-1" required>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Completado">Completado</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="material_purpose" class="block text-gray-700">Propósito del Material</label>
                        <input type="text" id="material_purpose" name="material_purpose" class="form-input w-full mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="material_requested" class="block text-gray-700">Material Solicitado</label>
                        <select id="material_requested" name="material_requested" class="form-select w-full mt-1" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>