<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muestra el login solo si el usuario no tiene una sesión administrativa activa
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.leads.index');
        }
        return view('auth.login');
    }

    // Procesa las credenciales y valida el nivel de privilegios en el sistema
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Filtro de seguridad: El panel está restringido estrictamente a ingenieros administradores
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.leads.index');
            }

            // Si un usuario general intenta colarse, destruimos el intento de inmediato por seguridad
            Auth::logout();
            return back()->withErrors([
                'email' => 'Acceso restringido únicamente a ingenieros administradores.',
            ]);
        }

        // Error genérico para no dar pistas a atacantes sobre qué campo falló
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Cierre de sesión blindado: Destruye datos en el servidor y limpia rastros en el navegador
    public function logout(Request $request)
    {
        Auth::logout();

        // Rompe la sesión actual para invalidar la cookie del cliente
        $request->session()->invalidate();

        // Cambia el token CSRF para mitigar ataques de fijación de sesión (Session Fixation)
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}