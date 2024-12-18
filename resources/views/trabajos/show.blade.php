<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Trabajo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <p><strong>Cliente:</strong> {{ $trabajo->cliente->nombre }}</p>
                <p><strong>Descripción:</strong> {{ $trabajo->descripcion }}</p>
                <p><strong>Estado:</strong> {{ ucfirst($trabajo->estado) }}</p>
                <p><strong>Costo:</strong> {{ number_format($trabajo->costo, 2) }}</p>
                <p><strong>Tipo de Comprobante:</strong> {{ $trabajo->tipo_comprobante }}</p>
                <p><strong>Propósito del Material:</strong> {{ $trabajo->material_purpose }}</p>
                <p><strong>Material Recibido:</strong> {{ $trabajo->material_received ? 'Sí' : 'No' }}</p>
                <p><strong>Usuario que realiza el trabajo:</strong> {{ $trabajo->trabajoUsuario->name }}</p>
                <p><strong>Fecha de Ingreso:</strong> {{ $trabajo->fecha_ingreso->format('Y-m-d') }}</p>
                <p><strong>Fecha de Culminación:</strong> {{ $trabajo->fecha_culminacion ? $trabajo->fecha_culminacion->format('Y-m-d') : 'N/A' }}</p>
                <p><strong>Observaciones:</strong> {{ $trabajo->observaciones ? 'Sí' : 'No' }}</p>
                @if ($trabajo->observaciones)
                    <p><strong>Texto de Observación:</strong> {{ $trabajo->observacion_texto }}</p>
                @endif
                <p><strong>Conformidad del Cliente:</strong> {{ $trabajo->conformidad_cliente ? 'Sí' : 'No' }}</p>
                @if (!$trabajo->conformidad_cliente)
                    <p><strong>Texto de Conformidad:</strong> {{ $trabajo->conformidad_texto }}</p>
                @endif
                <a href="{{ route('trabajos.index') }}" class="btn">Volver a la lista</a>
            </div>
        </div>
    </div>
</x-app-layout>