<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,correoelectronico',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        // Crear un nuevo usuario
        $usuario = new Usuarios;
        $usuario->nombre = $validatedData['full_name'];
        $usuario->apellido = $validatedData['last_name'];
        $usuario->correoelectronico = $validatedData['email'];
        $usuario->telefono = $validatedData['phone'];
        $usuario->contraseña = Hash::make($validatedData['password']); // Hashear la contraseña antes de guardarla

        // Guardar el usuario en la base de datos
        $usuario->save();

        // Redireccionar o devolver una respuesta
        return redirect()->back()->with('success', 'Usuario registrado exitosamente');
    }
}
