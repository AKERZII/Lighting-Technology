<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lighting Technology — Soluciones IoT')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'DM Sans', sans-serif; }
        .font-display { font-family: 'Syne', sans-serif; }
    </style>
</head>
<body class="bg-[#0A0E1A] text-white antialiased min-h-screen flex flex-col justify-between">

    {{-- ===== NAVBAR / ENCABEZADO ===== --}}
    <header class="fixed top-0 left-0 right-0 z-50 border-b border-white/5 bg-[#0A0E1A]/80 backdrop-blur-md print:hidden">
        <nav class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            
            {{-- Logo de la Empresa provisional--}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-cyan-400 flex items-center justify-center">
                    <svg class="w-4 h-4 text-[#0A0E1A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="font-display font-bold text-lg tracking-tight">
                    Lighting <span class="text-cyan-400">Technology</span>
                </span>
            </a>

            {{-- Links de Escritorio --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="text-sm {{ request()->routeIs('home') ? 'text-cyan-400 font-semibold' : 'text-white/50 hover:text-white' }} transition-colors">
                   Inicio
                </a>
                <a href="{{ route('services.index') }}"
                   class="text-sm {{ request()->routeIs('services.*') ? 'text-cyan-400 font-semibold' : 'text-white/50 hover:text-white' }} transition-colors">
                   Servicios                
                </a>
                <a href="{{ route('leads.create') }}"
                   class="text-sm {{ request()->routeIs('leads.create') ? 'text-cyan-400 font-semibold' : 'text-white/50 hover:text-white' }} transition-colors">
                   Contacto
                </a>
                {{-- Link rápido al Panel de Ingeniería (Opcional) pendiente aplicar --}}

                @auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.leads.index') }}" class="text-cyan-400 font-bold">
            Panel Técnico
        </a>
    @endif
@endauth
            </div>

            {{-- CTA + Botón de menú hamburguesa --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('leads.create') }}"
                   class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-cyan-400 text-[#0A0E1A] text-sm font-semibold hover:bg-cyan-300 transition-colors">
                    Solicitar propuesta
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/>
                    </svg>
                </a>
                <button id="menuToggle" class="md:hidden p-2 text-white/50 hover:text-white" aria-label="Abrir menú">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </nav>

        {{-- Menú móvil --}}
        <div id="mobileMenu" class="hidden md:hidden border-t border-white/5 px-6 py-4 flex flex-col gap-4 bg-[#0A0E1A]">
            <a href="{{ route('home') }}" class="text-sm text-white/60">Inicio</a>
            <a href="{{ route('services.index') }}" class="text-sm text-white/60">Servicios</a>
            <a href="{{ route('leads.create') }}" class="text-sm text-white/60">Contacto</a>
            <a href="{{ route('admin.leads.index') }}" class="text-sm text-white/30">Panel Técnico</a>
            <a href="{{ route('leads.create') }}" class="text-sm font-semibold text-cyan-400">Solicitar propuesta →</a>
        </div>
    </header>

    {{--  CONTENIDO PRINCIPAL --}}
    <main class="pt-16 flex-grow">
        
        {{-- Notificaciones para Formularios pendiente aplicar --}}
        <div class="max-w-7xl mx-auto px-6 mt-4 print:hidden">
            @if(session('success'))
                <div class="p-4 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-400 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')
    </main>

    {{-- PIE DE PÁGINA --}}
    <footer class="border-t border-white/5 mt-24 bg-[#070a14] print:hidden">
        <div class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-md bg-cyan-400 flex items-center justify-center">
                    <svg class="w-3 h-3 text-[#0A0E1A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="font-display text-sm font-semibold">Lighting Technology</span>
            </div>
            <p class="text-sm text-white/25">
                &copy; {{ date('Y') }} Lighting Technology. Todos los derechos reservados.
            </p>
            <div class="flex gap-6">
                <a href="{{ route('services.index') }}" class="text-sm text-white/35 hover:text-white/70 transition-colors">Servicios</a>
                <a href="{{ route('leads.create') }}" class="text-sm text-white/35 hover:text-white/70 transition-colors">Contacto</a>
            </div>
        </div>
    </footer>

    {{-- Script interactivo para el menú móvil--}}
    <script>
        document.getElementById('menuToggle').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>
</body>
</html>