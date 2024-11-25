<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cliente;

class ClientePolicy
{
    /**
     * Determine whether the user can view any clients.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('ver clientes');
    }

    /**
     * Determine whether the user can view the client.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cliente  $cliente
     * @return mixed
     */
    public function view(User $user, Cliente $cliente)
    {
        return $user->can('ver clientes');
    }

    /**
     * Determine whether the user can create clients.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('crear clientes');
    }

    /**
     * Determine whether the user can update the client.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cliente  $cliente
     * @return mixed
     */
    public function update(User $user, Cliente $cliente)
    {
        return $user->can('editar clientes');
    }

    /**
     * Determine whether the user can delete the client.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cliente  $cliente
     * @return mixed
     */
    public function delete(User $user, Cliente $cliente)
    {
        return $user->can('eliminar clientes');
    }

    // Otros métodos como restore, forceDelete si son necesarios
}
