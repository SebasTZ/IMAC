<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pedido;

class PedidoPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('ver pedidos');
    }

    public function view(User $user, Pedido $pedido)
    {
        return $user->can('ver pedidos');
    }

    public function create(User $user)
    {
        return $user->can('crear pedidos');
    }

    public function update(User $user, Pedido $pedido)
    {
        return $user->can('editar pedidos');
    }

    public function delete(User $user, Pedido $pedido)
    {
        return $user->can('eliminar pedidos');
    }

    public function report(User $user)
    {
        return $user->can('reporte pedidos');
    }
}