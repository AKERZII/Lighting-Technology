<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    // Despacha la vista pública del formulario de levantamiento de requerimientos
    public function create()
    {
        return view('leads.create');
    }

    // Recibe, sanitiza y almacena la problemática enviada por el prospecto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'company'     => 'nullable|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'nullable|string|max:20',
            'title'       => 'required|string|max:255',
            'category'    => 'required|string|max:100', // <-- Agregado para soportar el dropdown técnico
            'description' => 'required|string|min:20',
        ]);

        // Guardamos directamente aprovechando la protección masiva del modelo ($fillable)
        Lead::create($validated);

        // Retornamos con feedback visual positivo para el usuario
        return redirect()->route('leads.create')->with(
            'success', 
            '¡Tu solicitud ha sido enviada con éxito! Nuestro equipo de ingeniería IoT la revisará pronto.'
        );
    }
}