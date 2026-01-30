<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //1. Funció per mostrar totes les tasques
    public function index(){
        $tasques = Task::all();
        $categories = Category::all();
        return view('tasks.index', [
            'totesLesTasques' => $tasques,
            'totesLesCategories' => $categories,
        ]);
    }
    //2. Funció per guardar una nova tasca
    public function store(Request $request){
        $request->validate([
            'titol' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
        Task::create([
            'titol' => $request->titol,
            'category_id' => $request->category_id,
        ]);
        return redirect()->back();
    }
    //3. Funció per cambiar o el nom o la categoria de la tasca(update)
    public function update(Request $request, $id){
        $task = Task::findOrFail($id);
        $task->titol = $request->titol;
        $task->category_id = $request->category_id;
        $task->save();
        return redirect()->back();
    }

    //4. Funció per eliminar una tasca (delete)
    public function destroy($id){
        $tasca = Task::findOrFail($id);
        $tasca->delete();
        return redirect()->back();
    }
}