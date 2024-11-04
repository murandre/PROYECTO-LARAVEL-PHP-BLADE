<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiSocioController;

Route::get('/socios', [ApiSocioController::class, 'index']); // Obtener todos los socios
Route::post('/socios', [ApiSocioController::class, 'store']); // Crear un nuevo cliente
Route::get('/socios/{id}', [ApiSocioController::class, 'show']); // Obtener un cliente por ID
Route::put('/socios/{id}', [ApiSocioController::class, 'update']); // Actualizar un cliente por ID
Route::delete('/socios/{id}', [ApiSocioController::class, 'destroy']); // Eliminar un cliente por ID