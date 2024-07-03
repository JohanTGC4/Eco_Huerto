<?php
namespace App\Http\Controllers;

use App\Models\PlantaModel;
use Illuminate\Http\Request;

class PlantaController extends Controller{
    public function index(){
        $plants = PlantaModel::all();
        return view('admin.Plantas.homeCrud', compact('plants'));
    }

    public function create(){
        return view('admin.Plantas.plantaCreate');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2046',
            'descripcion' => 'required',
            'seleccion' => 'required|integer',
        ]);

        if($request->hasFile('imagen')){
            $imagePath = $request->file('imagen')->store('images', 'public');
        }else{
            return back()->withErrors(['imagen' => 'Error al subir la imagen']);
        }

        PlantaModel::create([
            'nombre' => $request->nombre,
            'imagen' => $imagePath,
            'descripcion' => $request->descripcion,
            'categoria_planta_id_categoriaplanta' => $request->seleccion,
        ]);

        return redirect()->route('homeCrud')->with('success', 'Planta agregada exitosamente');
    }

    public function show($id){
        $plant = PlantaModel::findOrFail($id);
        return view('admin.Plantas.plantaShow', compact('plant'));
    }

    public function edit($id){
        $plant = PlantaModel::findOrFail($id);
        return view('admin.Plantas.plantaEdit', compact('plant'));
    }

    public function update(Request $request, $id){
        dd($request->all());
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'imagen|mimes.jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required',
        ]);

        $plant = PlantaModel::findOrFail($id);
        if($request->hasFile('imagen')){
            $imagePath = $request->file('imagen')->store('images', 'public');
            $plant->imagen = $imagePath;
        }

        $plant->nombre = $request->nombre;
        $plant->descripcion = $request->descripcion;
        $plant->save();

        return redirect()->route('admin.Plantas.homeCrud')->with('success', 'Planta actualizada exitosamente');
    }

    public function destroy(String $id){
        $cat = PlantaModel::findOrFail($id);
        PlantaModel::where('categoria_planta_id_categoriaplanta', $id)->delete();
        $cat->delete();
        return redirect()->back();
    }
}