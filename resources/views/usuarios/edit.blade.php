<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @can('editar usuarios')
                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nombre</label>
                            <input type="text" class="form-input w-full mt-1" id="name" name="name" value="{{ $usuario->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" class="form-input w-full mt-1" id="email" name="email" value="{{ $usuario->email }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Nueva Contraseña (opcional)</label>
                            <input type="password" class="form-input w-full mt-1" id="password" name="password">
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-input w-full mt-1" id="password_confirmation" name="password_confirmation">
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-gray-700">Rol</label>
                            <select name="role" id="role" class="form-select w-full mt-1">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ $usuario->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                @else
                    <p>No tienes permiso para editar usuarios.</p>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>