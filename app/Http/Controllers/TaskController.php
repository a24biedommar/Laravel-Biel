<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //1. Funció per mostrar totes les tasques
    public function index(){
        $tasques = Task::all();
        return view('todo', ['todasLasTareas' => $tasques]);
    }
}