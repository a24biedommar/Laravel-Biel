<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //1. Funció per mostrar totes les categories
    public function index(){
        $categories = Category::all();
        // Reutilitzem la vista `todo.blade.php` (adaptada a categories)
        return view('categories.index', ['totesLesCategories' => $categories]);
    }

    //2. Funció per guardar una nova categoria
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }

    //3. Funció per eliminar una categoria
    public function destroy($id){
        $category = Category::findOrFail($id);

        // Si la categoria té tasques associades, no la deixem eliminar
        if ($category->tasks()->exists()) {
            return redirect()
                ->back()
                ->with('error', 'No se puede eliminar la categoría porque tiene tareas asignadas a esta.');
        }

        $category->delete();
        return redirect()->back();
    }
}
