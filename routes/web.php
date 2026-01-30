<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

//Rutes per categories
//Ruta per obtenir totes les categories 
Route::get('/categories', [CategoryController::class, 'index']);
//Ruta per guardar una nova categoria
Route::post('/categories/guardar', [CategoryController::class, 'store']);
//Ruta per actualitzar una categoria
Route::put('/categories/actualitzar/{id}', [CategoryController::class, 'update']);
//Ruta per eliminar una categoria
Route::delete('/categories/eliminar/{id}', [CategoryController::class, 'destroy']);

//Rutes per tasques
//Ruta per obtenir totes les tasques
Route::get('/tasks', [TaskController::class, 'index']);
//Ruta per guardar una nova tasca
Route::post('/tasks/guardar', [TaskController::class, 'store']);
//Ruta per actualitzar una tasca (marcar com a completada)
Route::put('/tasks/actualitzar/{id}', [TaskController::class, 'update']);
//Ruta per eliminar una tasca
Route::delete('/tasks/eliminar/{id}', [TaskController::class, 'destroy']);