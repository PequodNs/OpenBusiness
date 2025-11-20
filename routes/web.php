<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('usuario.create');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
Route::get('/historial', [HistorialController::class, 'index'])->name('historial.index');


// Pedido Routes
use App\Http\Controllers\PedidoController;
Route::resource('pedidos', PedidoController::class);
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');

Route::post('/pedidos/{id}/estado', [PedidoController::class, 'actualizarEstado'])->name('pedidos.estado');
Route::post('/pedidos/{id}/cancelar', [PedidoController::class, 'cancelar'])->name('pedidos.cancelar');

//despacho routes
use App\Http\Controllers\DespachoController;
// Registrar recepción de un pedido
Route::get('/despacho/{pedido}/create', [DespachoController::class, 'create'])->name('despacho.create');
Route::post('/despacho/{pedido}', [DespachoController::class, 'store'])->name('despacho.store');

// Ver orden de despacho
Route::get('/despacho/ver/{id}', [DespachoController::class, 'show'])->name('despacho.show');
// Ver formulario para crear guía de despacho desde un pedido
Route::get('/pedidos/{id}/despacho/create', [DespachoController::class, 'create'])
    ->name('despachos.create');

// Guardar la guía de despacho
Route::post('/despachos', [DespachoController::class, 'store'])
    ->name('despachos.store');



