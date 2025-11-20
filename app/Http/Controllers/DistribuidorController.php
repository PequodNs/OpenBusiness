<?php

namespace App\Http\Controllers;

use App\Models\Distribuidor;
use App\Models\Imagen;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DistribuidorController extends Controller
{

     // mostrar la lista de Listado de distribuidores

    public function index()
    {
        $distribuidores = Distribuidor::with('imagenes')->orderBy('id', 'desc')->get();
        return view('distribuidores.index', compact('distribuidores'));
    }


     //crear un nuevo distribuidor

    public function create()
    {
        return view('distribuidores.create');
    }


     //Guardar un distribuidor

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'contacto' => 'nullable|string',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|email',
            'direccion' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        DB::beginTransaction();

        try {
            // Crear un distribuidor
            $distribuidor = Distribuidor::create([
                'nombre' => $request->nombre,
                'contacto' => $request->contacto,
                'telefono' => $request->telefono,
                'correo' => $request->correo,
                'direccion' => $request->direccion
            ]);

            // Subir logo si existe
            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('distribuidores', 'public');

                Imagen::create([
                    'ruta' => $path,
                    'tipo' => 'distribuidor',
                    'id_distribuidor' => $distribuidor->id
                ]);
            }

            // Registrar en historial
            Historial::create([
                'id_usuario' => Auth::id(),
                'accion' => 'Crear Distribuidor',
                'detalle' => "Se creó el distribuidor {$distribuidor->nombre}"
            ]);

            DB::commit();

            return redirect()->route('distribuidores.index')
                ->with('success', 'Distribuidor creado correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear distribuidor: ' . $e->getMessage());
        }
    }


     //Ver distribuidor 
    public function show($id)
    {
        $distribuidor = Distribuidor::with('productos', 'imagenes')->findOrFail($id);
        return view('distribuidores.show', compact('distribuidor'));
    }

    
      //ver formulario de editar
    public function edit($id)
    {
        $distribuidor = Distribuidor::findOrFail($id);
        return view('distribuidores.edit', compact('distribuidor'));
    }


     //Actualizar el distribuidor
  
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'contacto' => 'nullable|string',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|email',
            'direccion' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        DB::beginTransaction();

        try {
            $distribuidor = Distribuidor::findOrFail($id);

            // Actualizar datos
            $distribuidor->update([
                'nombre' => $request->nombre,
                'contacto' => $request->contacto,
                'telefono' => $request->telefono,
                'correo' => $request->correo,
                'direccion' => $request->direccion
            ]);

            // Subir nuevo logo
            if ($request->hasFile('logo')) {
                // Eliminar imagen anterior si existe
                if ($distribuidor->imagenes->count() > 0) {
                    foreach ($distribuidor->imagenes as $img) {
                        Storage::disk('public')->delete($img->ruta);
                        $img->delete();
                    }
                }

                $path = $request->file('logo')->store('distribuidores', 'public');

                Imagen::create([
                    'ruta' => $path,
                    'tipo' => 'distribuidor',
                    'id_distribuidor' => $distribuidor->id
                ]);
            }

            // Registrar historial
            Historial::create([
                'id_usuario' => Auth::id(),
                'accion' => 'Actualizar Distribuidor',
                'detalle' => "Se editó el distribuidor {$distribuidor->nombre}"
            ]);

            DB::commit();

            return redirect()->route('distribuidores.index')
                ->with('success', 'Distribuidor actualizado correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al actualizar distribuidor: ' . $e->getMessage());
        }
    }


        //Eliminar el distribuidor

    public function destroy($id)
    {
        $distribuidor = Distribuidor::findOrFail($id);

        // No se puede eliminar si tiene productos asociados
        if ($distribuidor->productos->count() > 0) {
            return redirect()->back()->with(
                'error',
                'No se puede eliminar el distribuidor porque tiene productos asociados.'
            );
        }

        // Eliminar logo si existe
        foreach ($distribuidor->imagenes as $img) {
            Storage::disk('public')->delete($img->ruta);
            $img->delete();
        }

        // Registrar en historial
        Historial::create([
            'id_usuario' => Auth::id(),
            'accion' => 'Eliminar Distribuidor',
            'detalle' => "Se eliminó el distribuidor {$distribuidor->nombre}"
        ]);

        $distribuidor->delete();

        return redirect()->route('distribuidores.index')->with('success', 'Distribuidor eliminado correctamente.');
    }
}
