@extends('layouts.app')

@section('title', 'Panel de Ingeniería — Lighting Technology')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12" x-data="{ search: '', statusFilter: 'todos' }">
    
    {{-- Barra superior de control y métricas rápidas --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="font-display text-3xl font-bold text-white tracking-tight">Casos de Estudio Recibidos</h2>
            <p class="text-white/60 text-sm mt-1">Bandeja de entrada centralizada para la evaluación de arquitecturas IoT.</p>
        </div>
        
        <div class="flex items-center gap-4 self-start md:self-auto">
            <div class="bg-white/5 px-4 py-2 rounded-xl border border-white/5 text-sm text-white/80">
                Total de solicitudes: <span class=\"text-cyan-400 font-bold\">{{ $leads->count() }}</span>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xs font-semibold text-rose-400 hover:text-rose-300 bg-rose-500/10 border border-rose-500/20 px-3 py-2 rounded-xl transition-colors">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>

    {{-- Buscador y filtros rápidos usando Alpine.js en cliente --}}
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-8">
        <div class="sm:col-span-2 relative">
            <input type="text" x-model="search" placeholder="Buscar por cliente, empresa o problema..." class="w-full bg-white/5 border border-white/10 focus:border-cyan-400 rounded-xl pl-10 pr-4 py-3 text-sm text-white focus:outline-none transition-colors">
            <div class="absolute left-3.5 top-3.5 text-white/30">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
        </div>
        <div>
            <select x-model="statusFilter" class="w-full bg-[#0A0E1A] border border-white/10 focus:border-cyan-400 rounded-xl px-4 py-3 text-sm text-white focus:outline-none cursor-pointer transition-colors">
                <option value="todos">Todos los estatus</option>
                <option value="pendiente">Pendientes</option>
                <option value="en_revision">En Revisión Técnica</option>
                <option value="cotizado">Soluciones Cotizadas</option>
                <option value="rechazado">Inviables / Rechazados</option>
            </select>
        </div>
    </div>

    {{-- Tabla de control operativo --}}
    <div class="bg-white/5 rounded-2xl border border-white/5 overflow-hidden backdrop-blur-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/10 bg-white/[0.02] text-xs font-bold uppercase tracking-wider text-white/40">
                        <th class="px-6 py-4">Solicitante / Entorno</th>
                        <th class="px-6 py-4">Proyecto / Reto Técnico</th>
                        <th class="px-6 py-4">Línea de Solución</th>
                        <th class="px-6 py-4">Fase Actual</th>
                        <th class="px-6 py-4 text-right">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm text-white/80">
                    @foreach($leads as $lead)
                    <tr x-show="(statusFilter === 'todos' || '{{ $lead->status }}' === statusFilter) && 
                                  ('{{ strtolower($lead->name) }}'.includes(search.toLowerCase()) || 
                                   '{{ strtolower($lead->company) }}'.includes(search.toLowerCase()) || 
                                   '{{ strtolower($lead->title) }}'.includes(search.toLowerCase()))"
                        class="hover:bg-white/[0.01] transition-colors">
                        
                        <td class="px-6 py-4">
                            <span class="font-semibold text-white block">{{ $lead->name }}</span>
                            <span class="text-xs text-white/40 block">{{ $lead->company ?? 'Proyecto Particular' }}</span>
                        </td>
                        
                        <td class="px-6 py-4 max-w-xs truncate">
                            <span class="text-white font-medium block truncate">{{ $lead->title }}</span>
                            <span class="text-xs text-white/40 font-mono">Folio: #{{ $lead->id }}</span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="text-xs bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 px-2.5 py-1 rounded-md font-medium">
                                {{ $lead->category }}
                            </span>
                        </td>
                        
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold
                                @if($lead->status === 'pendiente') text-amber-400
                                @elseif($lead->status === 'en_revision') text-sky-400
                                @elseif($lead->status === 'cotizado') text-emerald-400
                                @else text-rose-400 @endif">
                                <span class="w-1.5 h-1.5 rounded-full current-color
                                    @if($lead->status === 'pendiente') bg-amber-400
                                    @elseif($lead->status === 'en_revision') bg-sky-400
                                    @elseif($lead->status === 'cotizado') bg-emerald-400
                                    @else bg-rose-400 @endif"></span>
                                {{ $lead->status_label }}
                            </span>
                        </td>
                        
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="inline-flex items-center gap-1.5 text-xs font-bold bg-white/5 hover:bg-cyan-400 hover:text-[#0A0E1A] border border-white/10 px-3 py-2 rounded-lg transition-all">
                                Evaluar
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    
                    {{-- Estado vacío controlado por Alpine --}}
                    @if($leads->isEmpty())
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-white/30">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <svg class="w-8 h-8 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293H3"/></svg>
                                <span class="text-xs font-medium">No se han registrado solicitudes en la base de datos.</span>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection