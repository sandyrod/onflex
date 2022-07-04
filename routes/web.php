<?php

use App\Http\Livewire\Ciudades;
use App\Http\Livewire\Marcas;
use App\Http\Livewire\Modelos;
use App\Http\Livewire\PlanesPago;
use App\Http\Livewire\TiposCamion;
use App\Http\Livewire\Usuarios;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/perfil-usuario', Usuarios::class)->name('perfil-usuario');
Route::middleware(['auth:sanctum', 'verified'])->get('/planes-pago', PlanesPago::class)->name('planes-pago');
Route::middleware(['auth:sanctum', 'verified'])->get('/ciudades', Ciudades::class)->name('ciudades');
Route::middleware(['auth:sanctum', 'verified'])->get('/marcas', Marcas::class)->name('marcas');
Route::middleware(['auth:sanctum', 'verified'])->get('/tipos-camion', TiposCamion::class)->name('tipos-camion');
Route::middleware(['auth:sanctum', 'verified'])->get('/modelos', Modelos::class)->name('modelos');
//Route::middleware(['auth:sanctum', 'verified'])->get('/categorias', Categorias::class)->middleware('can:categorias')->name('categorias');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
