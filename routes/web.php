<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//Ruta per obtenir totes les tasques
Route::get('/tasques', [TaskController::class, 'index']);
