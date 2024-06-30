<?php
namespace App\Http\Controllers;

use App\Models\PlantaModel;
use Illuminate\Http\Request;

class PlantaController extends Controller{
    public function index(){
        $plants = PlantaModel::all();
        // print_r($plants);
        // dd($plants);
        // die();
        return view('Plantas.homeCrud', compact('plants'));
    }

    public function create(){
        return view('Plantas.plantaCreate');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'required|imagen|mimes:jpeg,png,jpg,gif|max:2046',
            'descripcion' => 'required',
        ]);

        $imagePath = $request->file('imagen')->store('images', 'public');

        PlantaModel::create([
            'nombre' => $request->nombre,
            'imagen' => $imagePath,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('Plantas.homeCrud')->with('success', 'Planta agregada exitosamente');
    }

    public function show($id)
    {
        $plant = PlantaModel::findOrFail($id);
        return view('Plantas.plantaShow', compact('plant'));
    }

    public function edit($id)
    {
        $plant = PlantaModel::findOrFail($id);
        return view('Plantas.plantaEdit', compact('plant'));
    }

    public function update(Request $request, $id){
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

        return redirect()->route('Plantas.homeCrud')->with('success', 'Planta actualizada exitosamente');
    }

    public function destroy($id){
        $plant = PlantaModel::findOrFail($id);
        $plant->delete();
        return redirect()->route('Plantas.homeCrud')->with('success', 'Planta eliminada exitosamente');
    }
}