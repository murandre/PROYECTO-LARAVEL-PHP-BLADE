<?php

use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Models\v_inscripcion_detalle;
use App\Models\Inscripciones;
use App\Models\Socio;
use App\Http\Controllers\auth\RegisteredUserController;
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
// Ruta para el método que usa Eloquent con modelo
Route::get('/inscripciones/detalle-eloquent-con-model', [InscripcionController::class, 'v_inscripciones_detalle_con_model'])->name('inscripciones.detalle.eloquent.con.model');

Route::get('/inscripciones/detalle', [InscripcionController::class, 'v_inscripcion_detalle'])->name('inscripciones.detalle');

// Ruta para el método que usa Eloquent sin modelo
Route::get('/inscripciones/detalle-eloquent-sin-model', [InscripcionController::class, 'v_inscripciones_detalle_eloquent_sin_model'])->name('inscripciones.detalle.eloquent.sin.model');

// Ruta para el método que usa Query Builder con DB::table (Primera variante)
Route::get('/inscripciones/detalle-querybuilder-1', [InscripcionController::class, 'v_inscripciones_detalle_querybuilder_1'])->name('inscripciones.detalle.querybuilder.1');

// Ruta para el método que usa Query Builder con DB::select (Segunda variante)
Route::get('/inscripciones/detalle-querybuilder-2', [InscripcionController::class, 'v_inscripciones_detalle_querybuilder_2'])->name('inscripciones.detalle.querybuilder.2');



Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rutas RESTful para la tabla Socio
    Route::get('/socios', [SocioController::class, 'index'])->name('socios.index');
    Route::post('/socios', [SocioController::class, 'store'])->name('socios.store');
    Route::get('/socios/create', [SocioController::class, 'create'])->name('socios.create');
    Route::get('/socios/{socio}', [SocioController::class, 'show'])->name('socios.show');
    Route::get('/socios/{socio}/edit', [SocioController::class, 'edit'])->name('socios.edit');
    Route::patch('/socios/{socio}', [SocioController::class, 'update'])->name('socios.update');
    Route::delete('/socios/{socio}', [SocioController::class, 'destroy'])->name('socios.destroy');
});

// Rutas RESTful para la tabla Entrenador
Route::get('/entrenadores', [EntrenadorController::class, 'index'])->name('entrenadores.index');
Route::post('/entrenadores', [EntrenadorController::class, 'store'])->name('entrenadores.store');
Route::get('/entrenadores/create', [EntrenadorController::class, 'create'])->name('entrenadores.create');
Route::get('/entrenadores/{entrenador}', [EntrenadorController::class, 'show'])->name('entrenadores.show');
Route::get('/entrenadores/{entrenador}/edit', [EntrenadorController::class, 'edit'])->name('entrenadores.edit');
Route::patch('/entrenadores/{entrenador}', [EntrenadorController::class, 'update'])->name('entrenadores.update');
Route::delete('/entrenadores/{entrenador}', [EntrenadorController::class, 'destroy'])->name('entrenadores.destroy');


// Rutas RESTful para la tabla Rutina
Route::get('/rutinas', [RutinaController::class, 'index'])->name('rutinas.index');
Route::post('/rutinas', [RutinaController::class, 'store'])->name('rutinas.store');
Route::get('/rutinas/create', [RutinaController::class, 'create'])->name('rutinas.create');
Route::get('/rutinas/{rutina}', [RutinaController::class, 'show'])->name('rutinas.show');
Route::get('/rutinas/{rutina}/edit', [RutinaController::class, 'edit'])->name('rutinas.edit');
Route::patch('/rutinas/{rutina}', [RutinaController::class, 'update'])->name('rutinas.update');
Route::delete('/rutinas/{rutina}', [RutinaController::class, 'destroy'])->name('rutinas.destroy');

// Rutas RESTful para la tabla Equipo
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
Route::get('/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');
Route::patch('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');

// Rutas RESTful para la tabla Inscripcion
Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
Route::post('/inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');
Route::get('/inscripciones/create', [InscripcionController::class, 'create'])->name('inscripciones.create');
Route::get('/inscripciones/{inscripcion}', [InscripcionController::class, 'show'])->name('inscripciones.show');
Route::get('/inscripciones/{inscripcion}/edit', [InscripcionController::class, 'edit'])->name('inscripciones.edit');
Route::patch('/inscripciones/{inscripcion}', [InscripcionController::class, 'update'])->name('inscripciones.update');
Route::delete('/inscripciones/{inscripcion}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');

// Rutas RESTful para la tabla Pago
Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
Route::get('/pagos/create', [PagoController::class, 'create'])->name('pagos.create');
Route::get('/pagos/{pago}', [PagoController::class, 'show'])->name('pagos.show');
Route::get('/pagos/{pago}/edit', [PagoController::class, 'edit'])->name('pagos.edit');
Route::patch('/pagos/{pago}', [PagoController::class, 'update'])->name('pagos.update');
Route::delete('/pagos/{pago}', [PagoController::class, 'destroy'])->name('pagos.destroy');


//Registro y Login
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'store'])->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::view('/registro', 'auth.registro')->name('registro');
Route::post('/registro', [RegisteredUserController::class,'store'])->name('registro.store');


//vista de heidisql
Route::get('/inscripciones/detalle', [InscripcionController::class, 'v_inscripcion_detalle'])->name('inscripciones.detalle');


