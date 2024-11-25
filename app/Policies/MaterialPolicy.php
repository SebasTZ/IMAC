<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Material;

class MaterialPolicy
{
    /**
     * Determine whether the user can view any materials.
     */
    public function viewAny(User $user)
    {
        return $user->can('ver materiales');
    }

    /**
     * Determine whether the user can view the material.
     */
    public function view(User $user, Material $material)
    {
        return $user->can('ver materiales');
    }

    /**
     * Determine whether the user can create materials.
     */
    public function create(User $user)
    {
        return $user->can('crear materiales');
    }

    /**
     * Determine whether the user can update the material.
     */
    public function update(User $user, Material $material)
    {
        return $user->can('editar materiales');
    }

    /**
     * Determine whether the user can delete the material.
     */
    public function delete(User $user, Material $material)
    {
        return $user->can('eliminar materiales');
    }
}
