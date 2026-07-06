<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Lead extends Model
{
    // Atributos permitidos para inserción directa en la base de datos
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'title',
        'category', // <-- Clave para que se guarde el tipo de solución requerida
        'description',
        'status',
    ];

    // Accessor: Mapea los estados técnicos en crudo de la BD a etiquetas legibles para la interfaz
    protected function statusLabel(): Attribute
    {
        return Attribute::make(
            get: function () {
                $labels = [
                    'pendiente'   => 'Pendiente',
                    'en_revision' => 'En revisión',
                    'cotizado'    => 'Cotizado',
                    'rechazado'   => 'Rechazado',
                ];

                // Si por alguna razón el estado no está mapeado, limpia los guiones bajos por estética
                return $labels[$this->status] ?? ucfirst(str_replace('_', ' ', $this->status));
            }
        );
    }
}