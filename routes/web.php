<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login.form');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');



Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('pedidos', PedidoController::class);
});