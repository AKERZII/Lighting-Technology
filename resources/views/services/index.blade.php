@extends('layouts.app')

@section('title', 'Servicios — Lighting Technology')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 space-y-16">
    
    {{-- Título de la sección --}}
    <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-bold tracking-widest text-cyan-400 uppercase bg-cyan-950/50 px-3 py-1 rounded-full border border-cyan-800/30">Líneas de Operación</span>
        <h2 class="font-display text-4xl font-bold text-white sm:text-5xl mt-3">Infraestructura y Soluciones Inteligentes</h2>
        <p class="mt-4 text-white/60 text-lg">Especialistas en la integración de hardware y software para el control de variables críticas de tu negocio.</p>
    </div>

    {{-- Rejilla de Especialidades Técnicas --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        {{-- Tarjeta 1: Instrumentación IoT --}}
        <div class="bg-white/5 border border-white/5 rounded-2xl p-8 backdrop-blur-sm hover:border-cyan-400/30 hover:bg-white/[0.07] transition-all duration-300 group flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 rounded-xl bg-cyan-400/10 flex items-center justify-center text-cyan-400 mb-6 border border-cyan-500/20">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 5h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                    </svg>
                </div>
                <h3 class="font-display text-xl font-bold text-white mb-3">Sensores e Instrumentación</h3>
                <p class="text-white/60 text-sm leading-relaxed mb-6">Despliegue y lectura de sensores industriales para monitorear temperaturas, flujos de aire, humedad y voltajes en tiempo real.</p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-white/5">
                <span class="text-xs font-semibold uppercase tracking-wider text-cyan-400/80">Hardware IoT</span>
                <a href="{{ route('leads.create') }}" class="text-xs font-medium text-white/40 hover:text-cyan-400 transition-colors">Solicitar análisis →</a>
            </div>
        </div>

        {{-- Tarjeta 2: Automatización Lumínica/Eléctrica --}}
        <div class="bg-white/5 border border-white/5 rounded-2xl p-8 backdrop-blur-sm hover:border-cyan-400/30 hover:bg-white/[0.07] transition-all duration-300 group flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 rounded-xl bg-cyan-400/10 flex items-center justify-center text-cyan-400 mb-6 border border-cyan-500/20">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="font-display text-xl font-bold text-white mb-3">Automatización Integral</h3>
                <p class="text-white/60 text-sm leading-relaxed mb-6">Diseño de tableros de control y algoritmos embebidos orientados a eficientar el encendido, apagado y consumo de plantas industriales.</p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-white/5">
                <span class="text-xs font-semibold uppercase tracking-wider text-cyan-400/80">Control</span>
                <a href="{{ route('leads.create') }}" class="text-xs font-medium text-white/40 hover:text-cyan-400 transition-colors">Solicitar análisis →</a>
            </div>
        </div>

        {{-- Tarjeta 3: Infraestructura y Servidores --}}
        <div class="bg-white/5 border border-white/5 rounded-2xl p-8 backdrop-blur-sm hover:border-cyan-400/30 hover:bg-white/[0.07] transition-all duration-300 group flex flex-col justify-between">
            <div>
                <div class="w-12 h-12 rounded-xl bg-cyan-400/10 flex items-center justify-center text-cyan-400 mb-6 border border-cyan-500/20">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-display text-xl font-bold text-white mb-3">Soporte e Infraestructura</h3>
                <p class="text-white/60 text-sm leading-relaxed mb-6">Mantenimiento preventivo de computadoras operativas, servidores locales de datos y optimización de bancos de energía UPS.</p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-white/5">
                <span class="text-xs font-semibold uppercase tracking-wider text-cyan-400/80">Soporte Técnico</span>
                <a href="{{ route('leads.create') }}" class="text-xs font-medium text-white/40 hover:text-cyan-400 transition-colors">Solicitar análisis →</a>
            </div>
        </div>
    </div>
</div>
@endsection