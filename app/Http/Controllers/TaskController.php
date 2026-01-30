<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //1. Funció per mostrar totes les tasques
    public function index(){
        $tasques = Task::all();
        return view('todo', ['totesLesTasques' => $tasques]);
    }
    //2. Funció per guardar una nova tasca
    public function store(Request $request){
        $request->validate([
            'titol' => 'required|string|max:255',
        ]);
        Task::create([
            'titol' => $request->titol
        ]);
        return redirect()->back();
    }
    //3. Funció per marcar una tasca com a completada (update)
    public function update($id){
        $tasca = Task::findOrFail($id); //Busquem la tasca per ID
        $tasca->completada = !$tasca->completada; //Cambien l'estat (al reves de lo que era)
        $tasca->save();
        return redirect()->back();
    }

    //4. Funció per eliminar una tasca (delete)
    public function destroy($id){
        $tasca = Task::findOrFail($id);
        $tasca->delete();
        return redirect()->back();
    }
}