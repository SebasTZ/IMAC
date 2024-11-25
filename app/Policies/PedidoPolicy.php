<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pedido;

class PedidoPolicy
{
    /**
     * Determine whether the user can view any orders.
     */
    public function viewAny(User $user)
    {
        return $user->can('ver pedidos');
    }

    /**
     * Determine whether the user can view the order.
     */
    public function view(User $user, Pedido $pedido)
    {
        return $user->can('ver pedidos');
    }

    /**
     * Determine whether the user can create orders.
     */
    public function create(User $user)
    {
        return $user->can('crear pedidos');
    }

    /**
     * Determine whether the user can update the order.
     */
    public function update(User $user, Pedido $pedido)
    {
        return $user->can('editar pedidos');
    }

    /**
     * Determine whether the user can delete the order.
     */
    public function delete(User $user, Pedido $pedido)
    {
        return $user->can('eliminar pedidos');
    }
}
