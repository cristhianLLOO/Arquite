<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoNuevoController;
use App\Http\Controllers\IniciarSecController;
use App\http\Controllers\RegistrarController;
use App\http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/productos', [ProductoController::class, 'index']);

Route::get('productos/lista', [ProductoNuevoController::class, 'lista'])->name('productos.lista');
Route::get('productos/create', [ProductoNuevoController::class, 'create'])->name('productos.create');
Route::post('productos/store', [ProductoNuevoController::class, 'store'])->name('productos.store');

Route::get('/iniciar', function () {
    return view('IniciarSec');
});

Route::get('/RegistrarUsuario', function () {
    return view('Registrar');
});
Route::post('/register', [RegistrarController::class, 'store'])->name('register.store');


Route::get('/login', function () {
    return view('IniciarSec');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas para restablecimiento de contraseñas
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::get('/productos.blade.php', function () {
    return view('productos.blade.php'); // Cambia esto al nombre de la vista que deseas mostrar
});
