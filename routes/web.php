<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('usuario.create');
});

Route::view('/categorias', 'categoria.index');
Route::view('/categorias/create', 'categoria.create');
Route::view('/categorias/edit', 'categoria.edit');

Route::view('/compras', 'compras.index');
Route::view('/compras/create', 'compras.create');
Route::view('/compras/edit', 'compras.edit');
Route::view('/compras/show', 'compras.show');

Route::view('/despacho', 'despacho.index');
Route::view('/despacho/create', 'despacho.create');
Route::view('/despacho/edit', 'despacho.edit');

Route::view('/historial', 'historial.index');

Route::view('/pedidos', 'pedidos.index');
Route::view('/pedidos/create', 'pedidos.create');
Route::view('/pedidos/edit', 'pedidos.edit');
Route::view('/pedidos/show', 'pedidos.show');

Route::view('/productos', 'productos.index');
Route::view('/productos/create', 'productos.create');
Route::view('/productos/edit', 'productos.edit');

Route::view('/proveedores', 'proveedores.index');
Route::view('/proveedores/create', 'proveedores.create');
Route::view('/proveedores/edit', 'proveedores.edit');

Route::view('/usuario', 'usuario.index');
Route::view('/usuario/create', 'usuario.create');

Route::view('/login', 'login.login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
