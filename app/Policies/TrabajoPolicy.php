<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Trabajo;

class TrabajoPolicy
{
    /**
     * Determine whether the user can view any trabajos.
     */
    public function viewAny(User $user)
    {
        return $user->can('ver trabajos');
    }

    /**
     * Determine whether the user can view the trabajo.
     */
    public function view(User $user, Trabajo $trabajo)
    {
        return $user->can('ver trabajos');
    }

    /**
     * Determine whether the user can create trabajos.
     */
    public function create(User $user)
    {
        return $user->can('crear trabajos');
    }

    /**
     * Determine whether the user can update the trabajo.
     */
    public function update(User $user, Trabajo $trabajo)
    {
        return $user->can('editar trabajos');
    }

    /**
     * Determine whether the user can delete the trabajo.
     */
    public function delete(User $user, Trabajo $trabajo)
    {
        return $user->can('eliminar trabajos');
    }
}
