{{-- resources/views/trabajos/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Nuevo Trabajo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('trabajos.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="pedido_id">Pedido</label>
                        <select id="pedido_id" name="pedido_id" required>
                            @foreach ($pedidos as $pedido)
                                <option value="{{ $pedido->id }}">{{ $pedido->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" required>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Completado">Completado</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="costo">Costo</label>
                        <input type="number" step="0.01" id="costo" name="costo" required min="0">
                    </div>
                    <button type="submit" class="btn">Guardar Trabajo</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
