<?php

namespace App\Http\Controllers;

use App\Models\Historial;

class HistorialController extends Controller
{
    
     // Mostrar todas las acciones registradas
     
    public function index()
    {
        $historial = Historial::with('usuario')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('historial.index', compact('historial'));
    }
}
