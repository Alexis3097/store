<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [App\Http\Controllers\CategoriaProductoController::class, 'allCategorias'])->name('categoria.all');
Route::get('/buscar-categoria', [App\Http\Controllers\CategoriaProductoController::class, 'buscarCategoria'])->name('buscarCategoria');
Route::get('/categoria/{id}', [App\Http\Controllers\ProductoController::class, 'productosXCategoria'])->name('categoria.productos');
Route::get('/categoria/buscar-productos/{idCategoria}', [App\Http\Controllers\ProductoController::class, 'buscarProductosXCategoria'])->name('categoria.productos.buscar');


Route::get('/categorias/producto/{id}', [App\Http\Controllers\ProductoController::class, 'productoDetallado'])->name('producto.detallado');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/usuarios', App\Http\Controllers\UserController::class);
Route::resource('/categoria-producto', App\Http\Controllers\CategoriaProductoController::class);
Route::get('/producto/buscar', [App\Http\Controllers\ProductoController::class, 'buscar'])->name('producto.buscar');
Route::resource('/producto', App\Http\Controllers\ProductoController::class);
