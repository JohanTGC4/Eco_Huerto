<?php

use App\Http\Controllers\PlantaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/inicio', function () {
    return view('home');
})->name('home');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/chatbot', function () {
    return view('chatbot');
})->name('chatbot');

Route::get('/comprar', function () {
    return view('comprar');
})->name('comprar');

Route::get('/detalles', function () {
    return view('detalles');
})->name('detalles');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/misPlantas', function () {
    return view('misplantas');
})->name('misplantas');

Route::get('/perfilC', function () {
    return view('perfilcli');
})->name('perfilcli');



Route::get('/homeCrud', [PlantaController::class, 'index'])->name('Plantas.homeCrud');
// Route::get('/homeCrud', function () {
//     return view('Plantas.homeCrud');
// })->name('homeCrud');

Route::get('/categoryCrud', function () {
    return view('categoryCrud');
})->name('categoryCrud');

Route::get('/productCrud', function () {
    return view('productCrud');
})->name('productCrud');



