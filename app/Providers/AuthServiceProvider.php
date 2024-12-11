<?php

namespace App\Providers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Material;
use App\Models\Trabajo;
use App\Policies\ClientePolicy;
use App\Policies\PedidoPolicy;
use App\Policies\MaterialPolicy;
use App\Policies\TrabajoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Cliente::class => ClientePolicy::class,
        Pedido::class => PedidoPolicy::class,
            // Material::class => MaterialPolicy::class,
        Trabajo::class => TrabajoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Definir permisos adicionales si es necesario
        Gate::define('manage-users', function ($user) {
            return $user->hasRole('Administrador');
        });
    }
}
