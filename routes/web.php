<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//Ruta per obtenir totes les tasques
Route::get('/tasques', [TaskController::class, 'index']);

//Ruta per guardar una nova tasca
Route::post('/tasques/guardar', [TaskController::class, 'store']);

//Ruta per actualitzar una tasca (marcar com a completada)
Route::put('/tasques/actualitzar/{id}', [TaskController::class, 'update']);

//Ruta per eliminar una tasca
Route::delete('/tasques/eliminar/{id}', [TaskController::class, 'destroy']);