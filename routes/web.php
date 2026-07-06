<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;

// Interfaz pública: Landing page y catálogo de servicios de marketing
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');

// Captura de leads: Formulario donde las empresas describen sus retos IoT
Route::get('/contacto', [LeadController::class, 'create'])->name('leads.create');
Route::post('/contacto', [LeadController::class, 'store'])->name('leads.store');

// Autenticación del staff: Acceso discreto para el equipo de ingenieros
Route::get('/admin-login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin-login', [AuthController::class, 'login'])->name('login.store');
Route::post('/admin-logout', [AuthController::class, 'logout'])->name('logout');

// Panel técnico privado: Espacio protegido para auditoría y dictamen de proyectos
Route::prefix('admin')
    ->name('admin.')
    ->middleware([AdminMiddleware::class])
    ->group(function () {
        Route::get('/propuestas', [AdminLeadController::class, 'index'])->name('leads.index');
        Route::get('/propuestas/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
        Route::patch('/propuestas/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.status');
    });