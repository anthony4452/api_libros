<?php

use App\Http\Controllers\Api\LibroController;
use App\Http\Controllers\Api\AutorController;


Route::apiResource('libros', LibroController::class);
Route::apiResource('autores', AutorController::class);
