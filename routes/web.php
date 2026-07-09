<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;

// ==========================================
// INTERFAZ PÚBLICA (MARKETING & CLIENTES)
// ==========================================
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');

// Captura de leads: Formulario donde las empresas describen sus retos IoT
Route::get('/contacto', [LeadController::class, 'create'])->name('leads.create');
Route::post('/contacto', [LeadController::class, 'store'])->name('leads.store');


// ==========================================
// PORTAL DE ACCESO DISCRETO (SÓLO STAFF)
// ==========================================
Route::get('/admin-login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin-login', [AuthController::class, 'login'])->name('login.store');
Route::post('/admin-logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// PANEL TÉCNICO PRIVADO (PROTEGIDO)
// ==========================================
Route::prefix('admin')
    ->name('admin.')
    ->middleware([AdminMiddleware::class]) // 👈 Filtro que bloquea accesos directos sin sesión
    ->group(function () {
        Route::get('/propuestas', [AdminLeadController::class, 'index'])->name('leads.index');
        Route::get('/propuestas/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
        Route::patch('/propuestas/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.status');
    });