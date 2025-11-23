<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistorialController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

//dashboard
Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect('/register');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index');
});

//Distruibuidor routes
use App\Http\Controllers\DistribuidorController;
Route::resource('distribuidores', DistribuidorController::class);


//producto routes
use App\Http\Controllers\ProductoController;
Route::resource('productos', ProductoController::class);

// Documentos
use App\Http\Controllers\DocumentoController;
Route::post('/documentos', [DocumentoController::class, 'store'])->name('documentos.store');
Route::get('/documentos/{id}/descargar', [DocumentoController::class, 'download'])->name('documentos.download');
Route::delete('/documentos/{id}', [DocumentoController::class, 'destroy'])->name('documentos.destroy');

//historial
//Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index');


// Pedido Routes
use App\Http\Controllers\PedidoController;
Route::resource('pedidos', PedidoController::class);
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
Route::get('/pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');

Route::post('/pedidos/{id}/estado', [PedidoController::class, 'actualizarEstado'])->name('pedidos.estado');
Route::post('/pedidos/{id}/cancelar', [PedidoController::class, 'cancelar'])->name('pedidos.cancelar');

//despacho routes
use App\Http\Controllers\DespachoController;
// Registrar recepción de un pedido
Route::get('/despacho/{pedido}/create', [DespachoController::class, 'create'])->name('despacho.create');
Route::post('/despacho/{pedido}', [DespachoController::class, 'store'])->name('despacho.store');
Route::get('/despachos/crear', [DespachoController::class, 'create'])->name('despachos.create');
// Ruta para listar los despachos
Route::get('/despachos', [DespachoController::class, 'index'])->name('despachos.index');

// Ruta para crear un nuevo despacho
Route::get('/despachos/crear', [DespachoController::class, 'create'])->name('despachos.create');

// Ver orden de despacho
Route::get('/despacho/ver/{id}', [DespachoController::class, 'show'])->name('despacho.show');
// Ver formulario para crear guía de despacho desde un pedido
Route::get('/pedidos/{id}/despacho/create', [DespachoController::class, 'create'])
    ->name('despachos.create');

// Guardar la guía de despacho
Route::post('/despachos', [DespachoController::class, 'store'])
    ->name('despachos.store');

// Proveedores 
use App\Http\Controllers\ProveedorController;
Route::resource('proveedores', ProveedorController::class);

// Despachos
Route::get('/despacho', [DespachoController::class, 'index'])->name('despacho.index');
Route::get('/despachos/crear/{id}', [DespachoController::class, 'create'])->name('despacho.create');
// Lista despachos
Route::get('/despachos', [DespachoController::class, 'index'])->name('despachos.index');

// Editar
Route::get('/despachos/{id}/editar', [DespachoController::class, 'edit'])->name('despachos.edit');

// Actualizar
Route::put('/despachos/{id}', [DespachoController::class, 'update'])->name('despachos.update');

// Eliminar
Route::delete('/despachos/{id}', [DespachoController::class, 'destroy'])->name('despachos.destroy');

// Pedido
Route::get('/pedidos/{id}/editar', [PedidoController::class, 'edit'])->name('pedidos.edit');
Route::put('/pedidos/{id}', [PedidoController::class, 'update'])->name('pedidos.update');
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');


// Ruta para listar los despachos
Route::get('/despachos', [DespachoController::class, 'index'])->name('despachos.index');

// Ruta para crear un nuevo despacho
Route::get('/despacho/create/{id}', [DespachoController::class, 'create'])
     ->name('despacho.create');


// Ruta para almacenar el nuevo despacho
Route::post('/despachos', [DespachoController::class, 'store'])->name('despachos.store');


Route::get('/despachos/{id}', [DespachoController::class, 'show'])
    ->name('despachos.show');


