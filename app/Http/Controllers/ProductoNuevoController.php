<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoNuevoController extends Controller
{
    public function lista()
    {
        $productos = Producto::all();
        return view('productos.lista', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.lista')
                         ->with('success', 'Producto creado exitosamente.');
    }
}

