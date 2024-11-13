<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Limpia las tablas de roles y permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permisos
        $permissions = [
            'ver clientes', 'crear clientes', 'editar clientes', 'eliminar clientes',
            'ver pedidos', 'crear pedidos', 'editar pedidos', 'eliminar pedidos',
            'ver materiales', 'crear materiales', 'editar materiales', 'eliminar materiales',
            'ver trabajos', 'crear trabajos', 'editar trabajos', 'eliminar trabajos',
            'ver usuarios', 'crear usuarios', 'editar usuarios', 'eliminar usuarios'
        ];

        // Crear permisos si no existen
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear el rol de Administrador y asignar todos los permisos
        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $adminRole->givePermissionTo(Permission::all()); // Da todos los permisos al administrador

        // Crear el rol de Ventas y asignar permisos específicos
        $ventasRole = Role::firstOrCreate(['name' => 'Ventas']);
        $ventasRole->syncPermissions([
            'ver pedidos', 'ver trabajos', 
            'ver materiales', 'crear materiales', 'editar materiales', 'eliminar materiales'
        ]);

        // Crear el rol de Taller y asignar permisos específicos
        $tallerRole = Role::firstOrCreate(['name' => 'Taller']);
        $tallerRole->syncPermissions([
            'ver pedidos', 'editar pedidos',
            'ver trabajos', 'editar trabajos'
        ]);
    }
}
