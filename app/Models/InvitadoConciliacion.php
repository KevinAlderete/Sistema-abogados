<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class InvitadoConciliacion extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'nombre',
        'dni_ruc',
        'empresa',
        'email',
        'telefono',
        'direccion',
        'referencia',
    ];

    public function toSearchableArray()
    {
        return [
            'nombre' => $this->nombre,
            'empresa' => $this->empresa,
    ];
}
}
