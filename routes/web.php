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
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('authenticate/login');
})->name('authenticate');

Route::get('/dashboard/empresa-de-transporte', function () {
    return view('business.page.index');
})->name('business-index');

Route::get('/dashboard/empresa-de-transporte/crear', function () {
    return view('business.page.create');
})->name('business-create');

Route::get('/dashboard/empresa-de-transporte/actualizar/{id}', function () {
    return view('business.page.update');
})->name('business-update');

Route::get('/dashboard/empresa-de-transporte/perfil/{id}', function () {
    return view('business.page.perfil');
})->name('business-perfil');

/* Rutas para clientes */

Route::get('/dashboard/clientes', function () {
    return view('clients.page.index');
})->name('clients-index');

Route::get('/dashboard/clientes/crear', function () {
    return view('clients.page.create');
})->name('clients-create');

Route::get('/dashboard/clientes/actualizar/{id}', function () {
    return view('clients.page.update');
})->name('clients-update');

Route::get('/404', function () {
    return view('errors.404');
})->name('errors-404');
