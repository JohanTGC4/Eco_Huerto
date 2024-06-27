<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
})->name('index');


// Route::get('/inicio', function () {
//     return view('home');
// })->name('home');
// Route::get('/blog', function () {
//     return view('blog');
// })->name('blog');

Route::get('/chatbot', function () {
    return view('chatbot');
})->name('chatbot');

    // Route::get('/comprar', function () {
    //     return view('comprar');
    // })->name('comprar');

Route::get('/detalles', function () {
    return view('detalles');
})->name('detalles');

Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::get('/misPlantas', function () {
//     return view('misplantas');
// })->name('misplantas');

// Route::get('/perfilC', function () {
//     return view('perfilcli');
// })->name('perfilcli');


Route::group(['prefix' => 'usuarios', 'middleware' => 'auth:usuario'], function() {
    Route::get('/perfilC', [PerfilController::class, 'index'])->name('perfilC');
    Route::get('/blog', [PerfilController::class, 'blog'])->name('blog');
    Route::get('/misPlantas', [PerfilController::class, 'misPlantas'])->name('misPlantas');
    Route::get('/comprar', [PerfilController::class, 'comprar'])->name('comprar');
    Route::get('/home', [PerfilController::class, 'home'])->name('home');
  
   
});


Route::post('/loginUsuario', [UsuarioController::class, 'login'])->name('loginUsuario');


Route::post('/registrar', [UsuarioController::class, 'register'])->name('registrar');