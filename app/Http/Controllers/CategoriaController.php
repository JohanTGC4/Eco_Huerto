<?php
namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use Illuminate\Http\Request;

class CategoriaController extends Controller{
    public function index(){
        $cats = CategoriaModel::all();
        return view('admin.Categorias.categoryCrud', compact('cats'));
    }

    public function create(){
        return view('admin.Categorias.categoryCreate');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
        ]);

        CategoriaModel::create([
            'nombre' => $request->nombre,
        ]);
        return redirect()->route('categoryCrud')->with('success', 'Categoría agregada exitosamente');
    }

    public function show($id){
        $cat = CategoriaModel::findOrFail($id);
        return view('admin.Categorias.categoryShow', compact('cat'));
    }

    public function edit($id){
        $cat = CategoriaModel::findOrFail($id);
        return view('admin.Categorias.categoryEdit', compact('cat'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
        ]);

        $cat = CategoriaModel::findOrFail($id);
        $cat->nombre = $request->nombre;
        $cat->save();

        return redirect()->route('admin.Categorias.categoryCrud')->with('success', 'Categoría actualizada exitosamente');
    }

    public function destroy($id){
        $cat = CategoriaModel::findOrFail($id);
        $cat->delete();
        return redirect()->route('admin.Categorias.categoryCrud')->with('success', 'Categoría eliminada exitosamente');
    }
}