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
        Route::get('pedidos', [PedidoController::class, 'index'])->name('ventas.pedidos.index');  // Ver pedidos
        Route::get('trabajos', [TrabajoController::class, 'index'])->name('ventas.trabajos.index'); // Ver trabajos
        Route::resource('materiales', MaterialController::class)->except(['show']); // Gestión de materiales sin "show"
        Route::get('materiales/{material}', [MaterialController::class, 'show'])->name('ventas.materiales.show'); // Ver material
    });

    // Rutas accesibles solo para el rol "Taller"
    Route::middleware(['role:"Taller"'])->group(function () {
        Route::get('pedidos', [PedidoController::class, 'index'])->name('taller.pedidos.index');  // Ver pedidos
        Route::get('trabajos', [TrabajoController::class, 'index'])->name('taller.trabajos.index'); // Ver trabajos
        Route::resource('trabajos', TrabajoController::class)->only(['create', 'edit', 'update', 'store', 'index']); // Crear, editar, actualizar, almacenar y ver lista de trabajos
        Route::resource('pedidos', PedidoController::class)->only(['edit', 'update'])->names([
            'edit' => 'taller.pedidos.edit',
            'update' => 'taller.pedidos.update',
        ]);    // Editar y actualizar pedidos
    });

    // Opcional: Rutas comunes para "Administrador" y "Ventas"
    Route::middleware(['role:"Administrador|Ventas"'])->group(function () {
        Route::resource('pedidos', PedidoController::class)->only(['index', 'show'])->names([
            'index' => 'adminventas.pedidos.index',
            'show' => 'adminventas.pedidos.show',
        ]); // Permiso de visualización
    });

    // Adding the missing route for pedidos.index
    Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index'); // New route for pedidos.index

    // Adding missing routes for clientes, usuarios, materiales, and trabajos
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index'); // New route for clientes.index
    Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index'); // New route for usuarios.index
    Route::get('materiales', [MaterialController::class, 'index'])->name('materiales.index'); // New route for materiales.index
    Route::get('trabajos', [TrabajoController::class, 'index'])->name('trabajos.index'); // New route for trabajos.index

    // Adding the missing route for pedidos.show
    Route::get('pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show'); // New route for pedidos.show
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
