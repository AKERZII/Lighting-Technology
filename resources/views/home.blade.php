@extends('layouts.app')

@section('title', 'Inicio — Lighting Technology')

@section('content')
<div class="space-y-24 py-12">

    {{-- Carrusel automatizado: Presentación de proyectos y capacidades mediante Alpine.js --}}
    <div class="relative max-w-7xl mx-auto px-6" 
         x-data="{ 
            activeSlide: 1, 
            slidesCount: 3,
            init() {
                // Transición cíclica automática cada 4 segundos para dinamismo visual
                setInterval(() => {
                    this.activeSlide = this.activeSlide === this.slidesCount ? 1 : this.activeSlide + 1;
                }, 4000);
            }
         }">
        
        <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-slate-950 h-[480px]">
            
            {{-- Slide 1: Enfoque de infraestructura e instrumentación --}}
            <div x-show="activeSlide === 1" 
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 class="absolute inset-0 w-full h-full">
                {{-- Corregimos la carga del recurso usando asset() para prevenir imágenes rotas --}}
                <img src="{{ asset('images/hero-iot.jpg') }}" alt="Ingeniería de Iluminación e Infraestructura IoT" class="w-full h-full object-cover opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent flex flex-col justify-end p-12">
                    <span class="text-xs font-bold uppercase tracking-widest text-cyan-400 mb-2">Soluciones Industriales</span>
                    <h3 class=\"font-display text-3xl font-bold text-white max-w-2xl\">Monitoreo de Variables Técnicas e Infraestructura Crítica</h3>
                </div>
            </div>
            
            {{-- Slide 2: Automatización y Control --}}
            <div x-show="activeSlide === 2" 
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 class="absolute inset-0 w-full h-full" style="display: none;">
                <img src="{{ asset('images/automation.jpg') }}" alt="Sistemas de Automatización Avanzada" class="w-full h-full object-cover opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent flex flex-col justify-end p-12">
                    <span class="text-xs font-bold uppercase tracking-widest text-cyan-400 mb-2">Automatización</span>
                    <h3 class="font-display text-3xl font-bold text-white max-w-2xl">Control Eficiente de Consumo de Energía Eléctrica</h3>
                </div>
            </div>

            {{-- Slide 3: Soporte y Respaldo --}}
            <div x-show="activeSlide === 3" 
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 class="absolute inset-0 w-full h-full" style="display: none;">
                <img src="{{ asset('images/support.jpg') }}" alt="Soporte Técnico de Servidores" class="w-full h-full object-cover opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent flex flex-col justify-end p-12">
                    <span class="text-xs font-bold uppercase tracking-widest text-cyan-400 mb-2">Soporte Continuo</span>
                    <h3 class="font-display text-3xl font-bold text-white max-w-2xl">Mantenimiento Preventivo a Servidores y Sistemas de Respaldo</h3>
                </div>
            </div>
        </div>

        {{-- Selectores manuales inferiores del carrusel --}}
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex gap-3 z-10">
            <template x-for="i in slidesCount">
                <button @click="activeSlide = i" 
                        :class="activeSlide === i ? 'bg-cyan-400 w-8' : 'bg-white/20 w-2.5'" 
                        class="h-2.5 rounded-full transition-all duration-300"></button>
            </template>
        </div>
    </div>

    {{-- Sección de Preguntas Frecuentes (FAQs) Dinámicas --}}
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-12">
            <h3 class="font-display text-2xl font-bold text-white sm:text-3xl">Preguntas Frecuentes</h3>
            <p class="text-sm text-white/60 mt-2">Respuestas rápidas sobre nuestra forma de evaluar e integrar tecnología.</p>
        </div>

        <div class="space-y-4" x-data="{ activeFaq: null }">
            {{-- FAQ Item 1 --}}
            <div class="bg-white/5 border border-white/5 rounded-2xl overflow-hidden">
                <button @click="activeFaq = activeFaq === 1 ? null : 1" class="w-full px-6 py-4 text-left flex items-center justify-between gap-4">
                    <span class="font-semibold text-sm text-white">¿Cómo evalúan la viabilidad de una problemática industrial?</span>
                    <svg class="w-4 h-4 text-white/40 transition-transform duration-300" :class="activeFaq === 1 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="activeFaq === 1" x-collapse class="px-6 pb-5 text-xs text-white/60 border-t border-white/5 leading-relaxed">
                    Analizamos las variables del entorno (infraestructura física, disponibilidad de red y compatibilidad eléctrica). Posteriormente, determinamos qué sensores específicos se requieren para mitigar o solucionar la falla.
                </div>
            </div>

            {{-- FAQ Item 2 --}}
            <div class="bg-white/5 border border-white/5 rounded-2xl overflow-hidden">
                <button @click="activeFaq = activeFaq === 2 ? null : 2" class="w-full px-6 py-4 text-left flex items-center justify-between gap-4">
                    <span class="font-semibold text-sm text-white">¿Ofrecen pólizas de soporte técnico tras la instalación?</span>
                    <svg class="w-4 h-4 text-white/40 transition-transform duration-300" :class="activeFaq === 2 ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="activeFaq === 2" x-collapse class="px-6 pb-5 text-xs text-white/60 border-t border-white/5 leading-relaxed">
                    Sí, proporcionamos mantenimiento técnico regular. Nos encargamos tanto de verificar los componentes de hardware en sitio como de optimizar el rendimiento de la plataforma web para garantizar continuidad total.
                </div>
            </div>
        </div>
    </div>

    {{-- Call to Action final --}}
    <div id="contacto" class="max-w-7xl mx-auto px-6">
        <div class="text-center bg-gradient-to-r from-cyan-500/10 to-transparent border border-white/5 p-12 rounded-3xl">
            <h4 class="font-display text-xl font-bold text-white">¿Tienes un reto operativo en tu empresa?</h4>
            <p class="text-sm text-white/60 mt-2 mb-6 max-w-xl mx-auto">Escríbenos para platicar los síntomas del problema y armarte una propuesta técnica a la medida.</p>
            <a href="{{ route('leads.create') }}" class="inline-flex items-center gap-2 text-sm font-bold bg-cyan-400 text-slate-950 px-6 py-3 rounded-xl hover:bg-cyan-300 transition-all transform active:scale-95 shadow-md shadow-cyan-400/10">
                Contactar con Ingeniería
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</div>
@endsection