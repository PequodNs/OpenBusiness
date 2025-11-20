<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Distribuidor;
use App\Models\Imagen;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    
     //Mostrar el listado de productos
     
    public function index()
    {
        $productos = Producto::with('distribuidor', 'imagenes')->orderBy('id', 'desc')->get();
        return view('productos.index', compact('productos'));
    }

 public function create()
    {
        $distribuidores = Distribuidor::all();
        return view('productos.create', compact('distribuidores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable',
            'id_distribuidor' => 'nullable|exists:distribuidores,id',
            'imagenes.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::beginTransaction();

        try {

            $producto = Producto::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'stock' => $request->stock,
                'stock_minimo' => $request->stock_minimo,
                'precio' => $request->precio, 
                'distribuidor_id' => $request->id_distribuidor   
            ]);

            if ($request->hasFile('imagenes')) {
                foreach ($request->file('imagenes') as $img) {

                    $path = $img->store('productos', 'public');

                    Imagen::create([
                        'ruta_imagen' => $path,
                        'tipo' => 'producto',
                        'id_producto' => $producto->id
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('productos.index')
                ->with('success', 'Producto creado correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error: '.$e->getMessage());
        }
    }

        //ver detalle del producto
    public function show($id)
    {
        $producto = Producto::with('distribuidor', 'imagenes')->findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    //editar el producto
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $distribuidores = Distribuidor::all();

        return view('productos.edit', compact('producto', 'distribuidores'));
    }

    //actualizar el producto
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'descripcion' => 'nullable',
            'distribuidor_id' => 'nullable|exists:distribuidores,id',
            'imagenes.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::beginTransaction();

        try {
            $producto = Producto::findOrFail($id);

            // Actualizar datos
            $producto->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'stock' => $request->stock,
                'stock_minimo' => $request->stock_minimo,
                'distribuidor_id' => $request->id_distribuidor
            ]);

            // Si sube nuevas imágenes, agregarlas
            if ($request->hasFile('imagenes')) {
                foreach ($request->file('imagenes') as $img) {
                    $path = $img->store('productos', 'public');

                    Imagen::create([
                        'ruta_imagen' => $path,
                        'tipo' => 'producto',
                        'id_producto' => $producto->id
                    ]);
                }
            }

            // Registrar historial
            Historial::create([
                'id_usuario' => Auth::id(),
                'accion' => 'Editar Producto',
                'detalle' => "Se editó el producto {$producto->nombre} (ID {$producto->id})"
            ]);

            DB::commit();

            return redirect()->route('productos.index')
                ->with('success', 'Producto actualizado correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al actualizar producto: '.$e->getMessage());
        }
    }

    //eliminar el producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        // Eliminar imágenes asociadas
        foreach ($producto->imagenes as $img) {
            Storage::disk('public')->delete($img->ruta_imagen);
            $img->delete();
        }

        // Registrar historial
        Historial::create([
            'id_usuario' => Auth::id(),
            'accion' => 'Eliminar Producto',
            'detalle' => "Se eliminó el producto {$producto->nombre} (ID {$producto->id})"
        ]);

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
