<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;

// Ruta principal de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas protegidas con autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Ruta del Dashboard (accesible a cualquier usuario autenticado)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas accesibles solo para el rol "Administrador"
    Route::middleware(['role:Administrador'])->group(function () {
        Route::resource('clientes', ClienteController::class);  // Gestión de clientes
        Route::resource('pedidos', PedidoController::class);    // Gestión de pedidos
        Route::resource('usuarios', UsuarioController::class);  // Gestión de usuarios (solo administrador)
    });

    // Rutas accesibles solo para el rol "Ventas"
    Route::middleware(['role:Ventas'])->group(function () {
        Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');  // Ver pedidos
        Route::get('trabajos', [TrabajoController::class, 'index'])->name('trabajos.index'); // Ver trabajos
        Route::resource('materiales', MaterialController::class)->except(['show']); // Gestión de materiales sin "show"
    });

    // Rutas accesibles solo para el rol "Taller"
    Route::middleware(['role:Taller'])->group(function () {
        Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');  // Ver pedidos
        Route::get('trabajos', [TrabajoController::class, 'index'])->name('trabajos.index'); // Ver trabajos
        Route::resource('trabajos', TrabajoController::class)->only(['edit', 'update']); // Editar y actualizar trabajos
        Route::resource('pedidos', PedidoController::class)->only(['edit', 'update']);    // Editar y actualizar pedidos
    });

    // Opcional: Rutas comunes para "Administrador" y "Ventas"
    Route::middleware(['role:Administrador|Ventas'])->group(function () {
        Route::resource('pedidos', PedidoController::class)->only(['index', 'show']); // Permiso de visualización
    });
});
