<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;

// Ruta principal redirige al login
Route::get('/', function () {
    return redirect()->route('login');
})->name('welcome');

// Rutas protegidas con autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas accesibles solo para el rol "Administrador" con permisos específicos
    Route::middleware(['role:Administrador'])->group(function () {
        Route::resource('clientes', ClienteController::class);
        Route::resource('pedidos', PedidoController::class);
        Route::resource('materiales', MaterialController::class);
        Route::resource('trabajos', TrabajoController::class);

        Route::middleware(['permission:ver usuarios'])->group(function () {
            Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
        });

        Route::middleware(['permission:crear usuarios'])->group(function () {
            Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
            Route::post('usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
        });

        Route::middleware(['permission:editar usuarios'])->group(function () {
            Route::get('usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
            Route::put('usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
        });

        Route::middleware(['permission:eliminar usuarios'])->group(function () {
            Route::delete('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
        });
    });

    // Rutas accesibles solo para el rol "Ventas"
    Route::middleware(['role:Ventas'])->group(function () {
        Route::get('pedidos', [PedidoController::class, 'index'])->name('ventas.pedidos.index');
        Route::get('trabajos', [TrabajoController::class, 'index'])->name('ventas.trabajos.index');
        Route::resource('materiales', MaterialController::class)->except(['show']);
        Route::get('materiales/{material}', [MaterialController::class, 'show'])->name('ventas.materiales.show');
    });

    // Rutas accesibles solo para el rol "Taller"
    Route::middleware(['role:Taller'])->group(function () {
        Route::resource('pedidos', PedidoController::class)->only(['edit', 'update'])->names([
            'edit' => 'pedidos.edit',
            'update' => 'pedidos.update',
        ]);
    });

    // Rutas generales
    Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('materiales', [MaterialController::class, 'index'])->name('materiales.index');
    Route::get('trabajos', [TrabajoController::class, 'index'])->name('trabajos.index');
    
    Route::get('trabajos/export', [TrabajoController::class, 'export'])->name('trabajos.export');
    Route::get('pedidos/export', [PedidoController::class, 'export'])->name('pedidos.export');
    
    Route::get('pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');
});

Route::get('/401', function () {
    return view('pages.401');
});
Route::get('/404', function () {
    return view('pages.404');
});
Route::get('/500', function () {
    return view('pages.500');
});