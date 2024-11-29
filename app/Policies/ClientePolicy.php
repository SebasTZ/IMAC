<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cliente;

class ClientePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('ver clientes');
    }

    public function view(User $user, Cliente $cliente)
    {
        return $user->can('ver clientes');
    }

    public function create(User $user)
    {
        return $user->can('crear clientes');
    }

    public function update(User $user, Cliente $cliente)
    {
        return $user->can('editar clientes');
    }

    public function delete(User $user, Cliente $cliente)
    {
        return $user->can('eliminar clientes');
    }
}