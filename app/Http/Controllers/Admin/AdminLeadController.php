<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class AdminLeadController extends Controller
{
    // Construye la bandeja de entrada centralizada ordenando los folios del más nuevo al más antiguo
    public function index()
    {
        $leads = Lead::latest()->get();
        return view('admin.leads.index', compact('leads'));
    }

    // Despacha el desglose de la ficha técnica para evaluación interna de arquitectura
    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    // Transiciona el flujo operativo del proyecto validando que el nuevo estado sea legítimo
    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|string|in:pendiente,en_revision,cotizado,rechazado'
        ]);

        $lead->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'El estado de la propuesta ha sido actualizado correctamente.');
    }
}