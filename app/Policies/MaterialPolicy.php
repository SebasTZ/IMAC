<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Material;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaterialPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('Administrador')) {
            return true; // Permitir todo al administrador
        }
    }

    public function viewAny(User $user)
    {
        return $user->can('ver materiales');
    }

    public function view(User $user, Material $material)
    {
        return $user->can('ver materiales');
    }

    public function create(User $user)
    {
        return $user->can('crear materiales');
    }

    public function update(User $user, Material $material)
    {
        return $user->can('editar materiales');
    }

    public function delete(User $user, Material $material)
    {
        return $user->can('eliminar materiales');
    }

    public function addStock(User $user)
    {
        return $user->can('agregar stock');
    }
}