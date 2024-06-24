<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'correo' => 'required',
            'contrasena' => 'required',
        ]);

        $user = Usuario::create([
            'usuario' => $request->usuario,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena),
        ]);
       
        return view('home');
    }
}
