<?php

use App\Http\Controllers\CategoriaController;
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



Route::get('/homeCrud', [PlantaController::class, 'index'])->name('homeCrud');
Route::get('/plantaCreate', [PlantaController::class, 'create'])->name('admin.Plantas.plantaCreate');
Route::post('/plantaStore', [PlantaController::class, 'store'])->name('admin.Plantas.plantaStore');
Route::get('/plantaShow/{id}', [PlantaController::class, 'show'])->name('admin.Plantas.plantaShow');
// Route::get('/homeCrud', function () {
//     return view('Plantas.homeCrud');
// })->name('homeCrud');

// Route::get('/plantaShow', function () {
//     return view('admin.Plantas.plantaShow');
// })->name('plantaShow');

Route::get('/plantaEdit', function () {
    return view('admin.Plantas.plantaEdit');
})->name('plantaEdit');

Route::get('/categoryCrud', [CategoriaController::class, 'index'])->name('categoryCrud');
Route::get('/categoryCreate', [CategoriaController::class, 'create'])->name('admin.Categorias.categoryCreate');
Route::post('/categoryStore', [CategoriaController::class, 'store'])->name('admin.Categorias.categoryStore');
Route::put('/categoryEdit/{id}', [CategoriaController::class, 'update'])->name('admin.Categorias.categoryEdit');
Route::delete('/categoryDestroy/{id}', [CategoriaController::class, 'destroy'])->name('admin.Categorias.category');
// Route::get('/categoryCrud', function () {
//     return view('admin.Categorias.categoryCrud');
// })->name('categoryCrud');

Route::get('/categoryShow', function () {
    return view('admin.Categorias.categoryShow');
})->name('categoryShow');

// Route::get('/categoryEdit', function () {
//     return view('admin.Categorias.categoryEdit');
// })->name('categoryEdit');

Route::get('/productCrud', function () {
    return view('productCrud');
})->name('productCrud');



