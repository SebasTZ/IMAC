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
    Route::get('pedidos/export', [PedidoController::class, 'export'])->name('pedidos.export');
    Route::get('trabajos/export', [TrabajoController::class, 'export'])->name('trabajos.export');

    //si se tiene bien definido los roles y permisos y ademas los policies, no es necesario usar middlewares para proteger las rutas
    //porque las rutas ya estan protegidas por los policies
    //lo que se puede hacer son excepciones personalizadas como sugerencia
    Route::resource('clientes', ClienteController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::resource('materiales', MaterialController::class);
    Route::resource('trabajos', TrabajoController::class)->except('index');
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('pedidos', PedidoController::class)->except('index');

    // Rutas generales
    Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('trabajos', [TrabajoController::class, 'index'])->name('trabajos.index');
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
