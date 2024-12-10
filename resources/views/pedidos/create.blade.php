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
                        <label for="material_id">Material</label>
                        <select id="material_id" name="material_id" required>
                            @foreach ($materiales as $material)
                                <option value="{{ $material->id }}">{{ $material->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="material_purpose">Propósito del Material</label>
                        <input type="text" id="material_purpose" name="material_purpose" required>
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
                        <label for="material_requested">Material Solicitado</label>
                        <select id="material_requested" name="material_requested" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Guardar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>