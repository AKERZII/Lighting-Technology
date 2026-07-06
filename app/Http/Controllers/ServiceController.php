<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Retorna el catálogo de capacidades IoT de Lighting Technology.
     */
    public function index()
    {
        return view('services.index');
    }
}