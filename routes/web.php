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
    Route::middleware(['role:"Administrador"'])->group(function () {
        Route::resource('clientes', ClienteController::class);  // Gestión de clientes
        Route::resource('pedidos', PedidoController::class);    // Gestión de pedidos
        Route::resource('usuarios', UsuarioController::class);  // Gestión de usuarios (solo administrador)
        Route::resource('materiales', MaterialController::class); // Gestión de materiales completa
        Route::resource('trabajos', TrabajoController::class);  // Gestión completa de trabajos
    });

    // Rutas accesibles solo para el rol "Ventas"
    Route::middleware(['role:"Ventas"'])->group(function () {
        Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');  // Ver pedidos
        Route::get('trabajos', [TrabajoController::class, 'index'])->name('trabajos.index'); // Ver trabajos
        Route::resource('materiales', MaterialController::class)->except(['show']); // Gestión de materiales sin "show"
        Route::get('materiales/{material}', [MaterialController::class, 'show'])->name('materiales.show'); // Ver material
    });

    // Rutas accesibles solo para el rol "Taller"
    Route::middleware(['role:"Taller"'])->group(function () {
        Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');  // Ver pedidos
        Route::get('trabajos', [TrabajoController::class, 'index'])->name('trabajos.index'); // Ver trabajos
        Route::resource('trabajos', TrabajoController::class)->only(['create', 'edit', 'update', 'store', 'index']); // Crear, editar, actualizar, almacenar y ver lista de trabajos
        Route::resource('pedidos', PedidoController::class)->only(['edit', 'update']);    // Editar y actualizar pedidos
    });

    // Opcional: Rutas comunes para "Administrador" y "Ventas"
    Route::middleware(['role:"Administrador|Ventas"'])->group(function () {
        Route::resource('pedidos', PedidoController::class)->only(['index', 'show']); // Permiso de visualización
    });
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
