<?php
namespace App\Http\Controllers;

use App\Models\Planta;
use Illuminate\Http\Request;

class PlantaController extends Controller{
    public function index(){
        $plants = Planta::all();
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

        Planta::create([
            'nombre' => $request->nombre,
            'imagen' => $imagePath,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('Plantas.homeCrud')->with('success', 'Planta agregada exitosamente');
    }

    public function show($id)
    {
        $plant = Planta::findOrFail($id);
        return view('Plantas.plantaShow', compact('plant'));
    }

    public function edit($id)
    {
        $plant = Planta::findOrFail($id);
        return view('Plantas.plantaEdit', compact('plant'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'imagen|mimes.jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required',
        ]);

        $plant = Planta::findOrFail($id);
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
        $plant = Planta::findOrFail($id);
        $plant->delete();
        return redirect()->route('Plantas.homeCrud')->with('success', 'Planta eliminada exitosamente');
    }
}