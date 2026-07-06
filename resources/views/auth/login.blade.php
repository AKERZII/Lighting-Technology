@extends('layouts.app')

@section('title', 'Acceso al Sistema — Lighting Technology')

@section('content')
<div class="min-h-[80vh] flex flex-col items-center justify-center px-6 py-12">
    
    <div class="w-full max-w-md relative group">
        {{-- Efecto estético de resplandor técnico de fondo --}}
        <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-2xl blur opacity-10 group-hover:opacity-20 transition duration-1000"></div>
        
        <div class="relative w-full bg-slate-950/40 rounded-2xl border border-white/5 p-8 backdrop-blur-md">
            
            {{-- Encabezado con Icono Tecnológico --}}
            <div class="text-center mb-8">
                <div class="w-12 h-12 rounded-xl bg-cyan-400/10 flex items-center justify-center text-cyan-400 mx-auto mb-4 border border-cyan-500/20">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h2 class="font-display text-xl font-bold text-white tracking-tight">Portal de Ingeniería</h2>
                <p class="text-xs text-white/40 mt-1">Identifícate para auditar y dictaminar solicitudes IoT</p>
            </div>

            {{-- Alerta en caso de credenciales inválidas o restricción de rol --}}
            @error('email')
                <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs rounded-xl flex items-center gap-2">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <form action="{{ route('login.store') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-white/50 mb-2">Identificador (Email)</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full bg-[#0A0E1A] border border-white/10 focus:border-cyan-400 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none transition-colors">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-white/50 mb-2">Clave de Conexión</label>
                    <input type="password" name="password" required class="w-full bg-[#0A0E1A] border border-white/10 focus:border-cyan-400 rounded-xl px-4 py-3.5 text-sm text-white focus:outline-none transition-colors">
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="relative flex items-center cursor-pointer group select-none">
                        <input type="checkbox" name="remember" class="sr-only peer">
                        <div class="w-4 h-4 rounded border border-white/20 bg-white/5 peer-checked:bg-cyan-400 peer-checked:border-cyan-400 transition-all flex items-center justify-center text-[#0A0E1A]">
                            <svg class="w-3 h-3 stroke-[3]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-xs text-white/40 group-hover:text-white/70 ml-2 transition-colors">Mantener sesión activa</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-cyan-400 text-[#0A0E1A] text-sm font-bold py-3.5 rounded-xl hover:bg-cyan-300 transition-all transform active:scale-[0.99] shadow-lg shadow-cyan-400/10 flex items-center justify-center gap-2">
                    <span>Autenticar Conexión</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection