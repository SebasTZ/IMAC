<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nombre</label>
                        <input type="text" class="form-input w-full mt-1" id="name" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" class="form-input w-full mt-1" id="email" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">Contraseña</label>
                        <input type="password" class="form-input w-full mt-1" id="password" name="password" required>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                        <input type="password" class="form-input w-full mt-1" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-gray-700">Rol</label>
                        <select id="role" name="role" class="form-select w-full mt-1" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
