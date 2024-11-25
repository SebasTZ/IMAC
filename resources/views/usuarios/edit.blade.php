<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
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
                            @foreach($roles as $rol)
                                <option value="{{ $rol->name }}" {{ $usuario->roles->contains('name', $rol->name) ? 'selected' : '' }}>
                                    {{ $rol->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
