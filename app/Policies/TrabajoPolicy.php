<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Trabajo;

class TrabajoPolicy
{
    public function before(User $user, $ability)
    {
        if ($user->hasRole('Administrador')) {
            return true; // Permitir todo al administrador
        }
    }

    public function viewAny(User $user)
    {
        return $user->can('ver trabajos');
    }

    public function view(User $user, Trabajo $trabajo)
    {
        return $user->can('ver trabajos');
    }

    public function create(User $user)
    {
        return $user->can('crear trabajos');
    }

    public function update(User $user, Trabajo $trabajo)
    {
        return $user->can('editar trabajos');
    }

    public function delete(User $user, Trabajo $trabajo)
    {
        return $user->can('eliminar trabajos');
    }

    public function report(User $user)
    {
        return $user->can('reporte trabajos');
    }
}