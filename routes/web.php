<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/registro', [AuthController::class, 'registro'])->name('registro');

Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//user
Route::get('/usuario/creado', action:[UserController::class,'create'])->name('user.create');
Route::post('/usuario/creado', action:[UserController::class,'store'])->name('user.store');

Route::get('/usuario/index',[UserController::class,'index'])->name('user.index');

Route::get('/usuario/update/{id}',[UserController::class,'edit'])->name('user.update');
Route::put('/usuario/update/{id}', [UserController::class,'update'])->name('user.update.data');

Route::get('/usuario/delete/{id}',[UserController::class,'destroy'])->name('user.destroy');