<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Mostrar listado de proveedores
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    // Mostrar formulario para crear un proveedor
    public function create()
    {
        return view('proveedores.create');
    }

    // Guardar un nuevo proveedor
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:500',
        ]);

        Proveedor::create($validatedData);

        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor creado correctamente.');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:500',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($validatedData);

        return redirect()->route('proveedores.index')
                        ->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index')
                        ->with('success', 'Proveedor eliminado correctamente.');
    }
}
