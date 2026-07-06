@extends('layouts.app')

@section('title', 'Detalle de Solicitud IoT — Lighting Technology')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    
    {{-- Navegación superior (Oculta automáticamente en la impresión del reporte físico) --}}
    <div class="mb-6 print:hidden flex items-center justify-between">
        <a href="{{ route('admin.leads.index') }}" class="text-sm text-white/60 hover:text-white inline-flex items-center gap-2 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Volver al listado
        </a>
        
        <span class="text-xs font-mono bg-white/5 border border-white/10 text-white/40 px-3 py-1 rounded-full">
            Estatus actual: <strong class="text-cyan-400">{{ $lead->status_label }}</strong>
        </span>
    </div>

    {{-- Feedback visual de éxito al actualizar estatus --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm rounded-xl print:hidden">
            {{ session('success') }}
        </div>
    @endif

    {{-- Ficha Técnica / Cuerpo Principal --}}
    <div class="bg-white/5 border border-white/5 rounded-2xl p-8 backdrop-blur-sm print:bg-white print:text-slate-900 print:border-none print:shadow-none">
        
        {{-- Encabezado de Documento Técnico --}}
        <div class="border-b border-white/10 pb-6 mb-6 print:border-slate-200">
            <div class="flex justify-between items-start gap-4">
                <div>
                    <span class="text-xs font-mono text-cyan-400 uppercase tracking-widest font-bold print:text-cyan-600">Dictamen Técnico</span>
                    <h2 class="font-display text-2xl font-bold text-white mt-1 print:text-slate-950">{{ $lead->title }}</h2>
                    <p class="text-xs text-white/40 mt-1 font-mono print:text-slate-500">Folio único de registro: #{{ $lead->id }} | Recibido: {{ $lead->created_at->format('d/m/Y H:i') }}</p>
                </div>
                {{-- Botón rápido para mandar a PDF/Impresora --}}
                <button onclick="window.print()" class="print:hidden p-2.5 bg-white/5 hover:bg-white/10 rounded-xl border border-white/10 text-white/60 hover:text-white transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                </button>
            </div>
        </div>

        {{-- Datos de Contacto e Identificación de Entorno --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
            <div class="bg-white/[0.02] border border-white/5 p-4 rounded-xl print:border-slate-100">
                <span class="text-[10px] font-bold uppercase tracking-wider text-white/40 print:text-slate-400 block mb-1">Datos del Solicitante</span>
                <strong class="text-white font-medium block print:text-slate-900">{{ $lead->name }}</strong>
                <span class="text-xs text-white/60 block mt-0.5 print:text-slate-600">{{ $lead->email }}</span>
                <span class="text-xs text-white/40 block print:text-slate-500">{{ $lead->phone ?? 'Sin teléfono registrado' }}</span>
            </div>
            <div class="bg-white/[0.02] border border-white/5 p-4 rounded-xl print:border-slate-100">
                <span class="text-[10px] font-bold uppercase tracking-wider text-white/40 print:text-slate-400 block mb-1">Entorno y Línea de Solución</span>
                <strong class="text-white font-medium block print:text-slate-900">{{ $lead->company ?? 'Proyecto Particular' }}</strong>
                <span class="text-xs text-cyan-400 font-mono block mt-1 print:text-cyan-600">{{ $lead->category }}</span>
            </div>
        </div>

        {{-- Contenido del Problema Redactado por el Cliente --}}
        <div class="mb-8">
            <h3 class="text-xs font-bold uppercase tracking-wider text-white/40 print:text-slate-400 mb-3">Descripción de la Sintomatología / Problemática</h3>
            <div class="bg-[#0A0E1A] border border-white/5 p-6 rounded-xl text-sm leading-relaxed text-white/80 whitespace-pre-line print:bg-slate-50 print:text-slate-800 print:border-slate-200">
                {{ $lead->description }}
            </div>
        </div>

        {{-- Espacio exclusivo para Líneas de Firmas Físicas (Solo visible al Imprimir / Exportar a PDF) --}}
        <div class="hidden print:grid grid-cols-2 gap-12 mt-16 pt-12 border-t border-slate-200 text-center text-xs">
            <div>
                <div class="w-48 border-b border-slate-400 mx-auto mb-2"></div>
                <p class="font-bold text-slate-700">Ingeniero Evaluador</p>
                <p class="text-slate-400 font-mono text-[10px]">Firma de Dictamen Técnico</p>
            </div>
            <div>
                <div class="w-48 border-b border-slate-400 mx-auto mb-2"></div>
                <p class="font-bold text-slate-700">Firma de Conformidad</p>
                <p class="text-slate-400 font-mono text-[10px]">Representante Nouva Tek</p>
            </div>
        </div>

        {{-- Sección de Operaciones y Control de Estatus (Oculta por completo al imprimir) --}}
        <div class="print:hidden border-t border-white/10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-white/60 mb-0.5">Actualizar fase del caso</label>
                <p class="text-[11px] text-white/40">Cambia el estatus global del análisis tecnológico en curso.</p>
            </div>
            {{-- Corregida la ruta para que coincida exactamente con admin.leads.status --}}
            <form action="{{ route('admin.leads.status', $lead) }}" method="POST" class="flex gap-3 w-full sm:w-auto">
                @csrf
                @method('PATCH')
                <select name="status" class="w-full sm:w-auto bg-[#0A0E1A] border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-cyan-400 cursor-pointer transition-colors">
                    <option value="pendiente" {{ $lead->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_revision" {{ $lead->status == 'en_revision' ? 'selected' : '' }}>En Revisión Técnica</option>
                    <option value="cotizado" {{ $lead->status == 'cotizado' ? 'selected' : '' }}>Solución Cotizada</option>
                    <option value="rechazado" {{ $lead->status == 'rechazado' ? 'selected' : '' }}>Rechazado / Inviable</option>
                </select>
                <button type="submit" class="bg-cyan-400 text-[#0A0E1A] text-xs font-bold px-5 py-2.5 rounded-lg hover:bg-cyan-300 transition-all transform active:scale-95 shadow-md shadow-cyan-400/5">
                    Actualizar
                </button>
            </form>
        </div>

    </div>
</div>
@endsection