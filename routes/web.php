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

Route::get('/dashboard/clientes/perfil/{id}', function () {
    return view('clients.page.profile');
})->name('clients-profile');

Route::get('/404', function () {
    return view('errors.404');
})->name('errors-404');
/* Rutas para Vehiculos */


Route::get('/dashboard/vehiculos', function () {
    return view('vehicles.page.index');
})->name('vehicles.index');
Route::get('/dashboard/vehiculos/crear', function () {
    return view('vehicles.page.create');
})->name('vehicles.create');
Route::get('/dashboard/vehiculos/actualizar/{id}', function () {
    return view('vehicles.page.update');
})->name('vehicles.update');
Route::get('/dashboard/vehiculos/perfil/{id}', function () {
    return view('vehicles.page.profile');
})->name('vehicles.profile');

/*Documentos vehiculos*/


/* ====================================================================================================================================================================== */
Route::get('/dashboard/vehiculos/documentos/soat', function () {
    return view('vehiclepapers.soat.page.index');
})->name('soat.index');
Route::get('/dashboard/vehiculos/documentos/soat/crear', function () {
    return view('vehiclepapers.soat.page.create');
})->name('soat.create');
Route::get('/dashboard/vehiculos/documentos/soat/actualizar/{id}', function () {
    return view('vehiclepapers.soat.page.update');
})->name('soat.update');
/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* ====================================================================================================================================================================== */
Route::get('/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil', function () {
    return view('vehiclepapers.policies.page.index');
})->name('policies.index');
Route::get('/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil/crear', function () {
    return view('vehiclepapers.policies.page.create');
})->name('policies.create');
Route::get('/dashboard/vehiculos/documentos/polizas-de-responsabilidad-civil/actualizar/{id}', function () {
    return view('vehiclepapers.policies.page.update');
})->name('policies.update');
/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* ====================================================================================================================================================================== */
Route::get('/dashboard/vehiculos/documentos/certificado-de-revision-tecnico-mecanica', function () {
    return view('vehiclepapers.rtm.page.index');
})->name('rtm.index');
Route::get('/dashboard/vehiculos/documentos/certificado-de-revision-tecnico-mecanica/crear', function () {
    return view('vehiclepapers.rtm.page.create');
})->name('rtm.create');
Route::get('/dashboard/vehiculos/documentos/certificado-de-revision-tecnico-mecanica/actualizar/{id}', function () {
    return view('vehiclepapers.rtm.page.update');
})->name('rtm.update');

/* ====================================================================================================================================================================== */
Route::get('/dashboard/vehiculos/documentos/tarjeta-de-operacion', function () {
    return view('vehiclepapers.operationcard.page.index');
})->name('operationcard.index');
Route::get('/dashboard/vehiculos/documentos/tarjeta-de-operacion/crear', function () {
    return view('vehiclepapers.operationcard.page.create');
})->name('operationcard.create');
Route::get('/dashboard/vehiculos/documentos/tarjeta-de-operacion/actualizar/{id}', function () {
    return view('vehiclepapers.operationcard.page.update');
})->name('operationcard.update');
Route::get('/dashboard/vehiculos/documentos/tarjeta-de-operacion/perfil/{id}/{code}', function () {
    return view('vehiclepapers.operationcard.page.profile');
})->name('operationcard.profile');

/* ====================================================================================================================================================================== */
Route::get('/dashboard/vehiculos/documentos/convenios', function () {
    return view('vehiclepapers.covenant.page.index');
})->name('covenant.index');
Route::get('/dashboard/vehiculos/documentos/convenios/crear', function () {
    return view('vehiclepapers.covenant.page.create');
})->name('covenant.create');
Route::get('/dashboard/vehiculos/documentos/convenios/actualizar/{id}', function () {
    return view('vehiclepapers.covenant.page.update');
})->name('covenant.update');
/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

