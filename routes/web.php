<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Middleware\isAuthenticated;
use App\Http\Middleware\IsAdmin;

/*Route::get('/', function () {
    return view('welcome');
});
*/

    Route::get('/home', [AuthController::class, 'home'])->name('home');

Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
     //usuario
    Route::get('/usuario/creado', [UserController::class, 'create'])->name('user.create');
    Route::post('/usuario/creado', [UserController::class, 'store'])->name('user.store');
    Route::get('/usuario/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/usuario/update/{id}', [UserController::class, 'edit'])->name('user.update');
    Route::put('/usuario/update/{id}', [UserController::class, 'update'])->name('user.update.data');
    Route::get('/usuario/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
     //productos
    Route::get('/producto/creado', [ProductoController::class, 'create'])->name('producto.create');
    Route::post('/producto/creado', [ProductoController::class, 'store'])->name('producto.store');
    Route::get('/producto/index', [ProductoController::class, 'index'])->name('producto.index');
    Route::get('/producto/update/{id}', [ProductoController::class, 'edit'])->name('producto.update');
    Route::put('/producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update.data');
    Route::get('/producto/delete/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');
     //pedidos
    Route::get('/pedido/creado', [PedidoController::class, 'create'])->name('pedido.create');
    Route::post('/pedido/creado', [PedidoController::class, 'store'])->name('pedido.store');
    Route::get('/pedido/index', [PedidoController::class, 'index'])->name('pedido.index');
    Route::get('/pedido/update/{id}', [PedidoController::class, 'edit'])->name('pedido.update');
    Route::put('/pedido/update/{id}', [PedidoController::class, 'update'])->name('pedido.update.data');
    Route::get('/pedido/delete/{id}', [PedidoController::class, 'destroy'])->name('pedido.destroy');
});


Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/registro', [AuthController::class, 'registro'])->name('registro');

Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



