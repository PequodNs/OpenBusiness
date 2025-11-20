<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    
     //Guardar un documento asociado a pedido o despacho

    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'tipo' => 'required|string',
            'id_pedido' => 'nullable|exists:pedidos,id',
            'id_despacho' => 'nullable|exists:orden_despacho,id'
        ]);

        $path = $request->file('documento')->store('documentos', 'public');

        $documento = Documento::create([
            'nombre' => $request->file('documento')->getClientOriginalName(),
            'ruta' => $path,
            'tipo' => $request->tipo,
            'id_pedido' => $request->id_pedido,
            'id_despacho' => $request->id_despacho
        ]);

        // Guardar acción en historial
        Historial::create([
            'id_usuario' => Auth::id(),
            'accion' => 'Subida de Documento',
            'detalle' => "Se subió un documento '{$documento->nombre}'"
        ]);

        return back()->with('success', 'Documento subido correctamente.');
    }

    
     // Descargar el documento
     
    public function download($id)
    {
        $doc = Documento::findOrFail($id);

        return Storage::disk('public')->download($doc->ruta, $doc->nombre);
    }

    
     // Eliminar documento
    
    public function destroy($id)
    {
        $documento = Documento::findOrFail($id);

        // Borrar archivo del storage
        Storage::disk('public')->delete($documento->ruta);

        // Registrar en historial
        Historial::create([
            'id_usuario' => Auth::id(),
            'accion' => 'Eliminar Documento',
            'detalle' => "Se eliminó el documento '{$documento->nombre}'"
        ]);

        $documento->delete();

        return back()->with('success', 'Documento eliminado.');
    }
}
