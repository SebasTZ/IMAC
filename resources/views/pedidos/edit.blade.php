<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pedido') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="material_id">Material</label>
                        <select id="material_id" name="material_id" required>
                            @foreach ($materiales as $material)
                                <option value="{{ $material->id }}" {{ $pedido->material_id == $material->id ? 'selected' : '' }}>{{ $material->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" required>
                            <option value="Pendiente" {{ $pedido->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="En Proceso" {{ $pedido->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                            <option value="Completado" {{ $pedido->estado == 'Completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="material_purpose">Propósito del Material</label>
                        <textarea id="material_purpose" name="material_purpose" required>{{ $pedido->material_purpose }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="material_requested">Material Solicitado</label>
                        <select id="material_requested" name="material_requested" required>
                            <option value="1" {{ $pedido->material_requested ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ !$pedido->material_requested ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="entrega_usuario_id">Usuario que entrega el material</label>
                        <select id="entrega_usuario_id" name="entrega_usuario_id" required>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" {{ $pedido->entrega_usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="recepcion_usuario_id">Usuario que recibe el material</label>
                        <select id="recepcion_usuario_id" name="recepcion_usuario_id" required>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" {{ $pedido->recepcion_usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn">Actualizar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>