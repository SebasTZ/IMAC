<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permisos
        $permissions = [
            'ver clientes', 'crear clientes', 'editar clientes', 'eliminar clientes',
            'ver pedidos', 'crear pedidos', 'editar pedidos', 'eliminar pedidos', 'reporte pedidos',
            'ver materiales', 'crear materiales', 'editar materiales', 'eliminar materiales',
            'ver trabajos', 'crear trabajos', 'editar trabajos', 'eliminar trabajos', 'reporte trabajos',
            'ver usuarios', 'crear usuarios', 'editar usuarios', 'eliminar usuarios',
        ];

        // Crear o actualizar permisos
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles
        $roles = [
            'Administrador' => Permission::all(),
            'Ventas' => [
                'ver clientes', 'crear clientes', 'editar clientes',
                'ver pedidos', 'editar pedidos', 'reporte pedidos',
                'ver materiales', 'crear materiales', 'editar materiales', 'eliminar materiales',
                'ver trabajos', 'editar trabajos', 'reporte trabajos'
            ],
            'Taller' => [
                'ver clientes', 'crear clientes', 'editar clientes',
                'ver pedidos','crear pedidos', 'editar pedidos', 'reporte pedidos',
                'ver trabajos','crear trabajos', 'editar trabajos', 'reporte trabajos',
            ],
        ];

        // Asignar permisos a roles
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}