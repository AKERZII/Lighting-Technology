@extends('layouts.app')

@section('title', 'Solicitar Propuesta IoT — Lighting Technology')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-16">
    
    {{-- Título y contexto inicial para guiar al usuario --}}
    <div class="text-center mb-12">
        <h2 class="font-display text-3xl font-bold sm:text-4xl text-white">Solicita tu Propuesta Tecnológica</h2>
        <p class="mt-3 text-white/60 max-w-xl mx-auto">Cuéntanos el reto o problema que enfrenta tu negocio y diseñaremos un ecosistema IoT para resolverlo.</p>
    </div>

    {{-- Layout de dos columnas: checklist informativo a la izquierda y el formulario a la derecha --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
        
        {{-- Explicación del flujo de trabajo --}}
        <div class="lg:col-span-1 space-y-6 bg-white/[0.02] border border-white/5 p-6 rounded-2xl">
            <h3 class="text-white font-bold text-sm uppercase tracking-wider text-cyan-400">¿Qué pasa después?</h3>
            
            <div class="space-y-4">
                <div class="flex gap-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-cyan-400/10 border border-cyan-500/20 flex items-center justify-center text-xs text-cyan-400 font-bold">1</div>
                    <p class="text-xs text-white/70 leading-relaxed"><strong class="text-white block">Evaluación Inicial:</strong> Nuestro equipo analiza la viabilidad de la infraestructura y los sensores requeridos.</p>
                </div>
                <div class="flex gap-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-cyan-400/10 border border-cyan-500/20 flex items-center justify-center text-xs text-cyan-400 font-bold">2</div>
                    <p class="text-xs text-white/70 leading-relaxed"><strong class="text-white block">Diseño de Solución:</strong> Trazamos la arquitectura de hardware y el flujo de datos en la nube.</p>
                </div>
                <div class="flex gap-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-cyan-400/10 border border-cyan-500/20 flex items-center justify-center text-xs text-cyan-400 font-bold">3</div>
                    <p class="text-xs text-white/70 leading-relaxed"><strong class="text-white block">Contacto Directo:</strong> Te enviamos una propuesta formal y agendamos una sesión técnica.</p>
                </div>
            </div>
        </div>

        {{-- Formulario de levantamiento técnico --}}
        <div class="lg:col-span-2 bg-white/5 border border-white/5 p-8 rounded-2xl backdrop-blur-sm">
            <form action="{{ route('leads.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-white/60 mb-2">Nombre completo</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-[#0A0E1A] border @error('name') border-red-500/50 focus:border-red-500 @else border-white/10 focus:border-cyan-400 @enderror rounded-lg px-4 py-3 text-white focus:outline-none transition-colors">
                        @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-white/60 mb-2">Empresa / Organización</label>
                        <input type="text" name="company" value="{{ old('company') }}" placeholder="Opcional (Ej. Proyecto particular)" class="w-full bg-[#0A0E1A] border border-white/10 focus:border-cyan-400 rounded-lg px-4 py-3 text-white focus:outline-none transition-colors">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-white/60 mb-2">Correo institucional</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-[#0A0E1A] border @error('email') border-red-500/50 focus:border-red-500 @else border-white/10 focus:border-cyan-400 @enderror rounded-lg px-4 py-3 text-white focus:outline-none transition-colors">
                        @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-white/60 mb-2">Teléfono de contacto</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Opcional" class="w-full bg-[#0A0E1A] border border-white/10 focus:border-cyan-400 rounded-lg px-4 py-3 text-white focus:outline-none transition-colors">
                    </div>
                </div>

                {{-- Campo Sincronizado: Tipo de Categoría/Solución requerida --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-white/60 mb-2">Título de la problemática</label>
                        <input type="text" name="title" value="{{ old('title') }}" required placeholder="Ej. Optimización de consumo lumínico en almacén" class="w-full bg-[#0A0E1A] border @error('title') border-red-500/50 focus:border-red-500 @else border-white/10 focus:border-cyan-400 @enderror rounded-lg px-4 py-3 text-white focus:outline-none transition-colors">
                        @error('title') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-white/60 mb-2">Tipo de Solución Requerida</label>
                    <select name="category" required class="w-full bg-[#0A0E1A] border @error('category') border-red-500/50 focus:border-red-500 @else border-white/10 focus:border-cyan-400 @enderror rounded-lg px-4 py-3 text-white focus:outline-none transition-colors cursor-pointer">
                        <option value="" disabled {{ old('category') ? '' : 'selected' }}>Selecciona una opción técnica...</option>
                        <option value="Sensores e Instrumentación" {{ old('category') == 'Sensores e Instrumentación' ? 'selected' : '' }}>Sensores e Instrumentación</option>
                        <option value="Automatización Integral" {{ old('category') == 'Automatización Integral' ? 'selected' : '' }}>Automatización Integral</option>
                        <option value="Soporte e Infraestructura" {{ old('category') == 'Soporte e Infraestructura' ? 'selected' : '' }}>Soporte e Infraestructura</option>
                        <option value="General" {{ old('category') == 'General' ? 'selected' : '' }}>Otra / Consulta General</option>
                    </select>
                    @error('category') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-white/60 mb-2">Descripción detallada de la problemática</label>
                    <textarea name="description" rows="5" required placeholder="Describe los síntomas del problema, las variables que te interesa medir (temperatura, humedad, voltaje) o las restricciones de tu entorno..." class="w-full bg-[#0A0E1A] border @error('description') border-red-500/50 focus:border-red-500 @else border-white/10 focus:border-cyan-400 @enderror rounded-lg px-4 py-3 text-white focus:outline-none transition-colors">{{ old('description') }}</textarea>
                    @error('description') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full py-4 rounded-lg bg-cyan-400 text-[#0A0E1A] font-bold hover:bg-cyan-300 transition-all transform active:scale-[0.99] shadow-lg shadow-cyan-400/10 flex items-center justify-center gap-2">
                    <span>Enviar Caso de Estudio</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection