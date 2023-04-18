<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Cliente extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'nombre',
        'apellidos',
        'genero',
        'dni_ruc',
        'empresa',
        'email',
        'telefono',
        'direccion',
        'referencia',
        'estado_cliente',
    ];

    public function toSearchableArray()
    {
        return [
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'dni_ruc' => $this->dni_ruc,
            'empresa' => $this->empresa,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
        ];
    }

    public function expedientes(): HasMany
    {
        return $this->hasMany(Expedientes::class, 'id_cliente', 'id');
    }

    public function casos(): HasMany
    {
        return $this->hasMany(Casos::class, 'id_cliente', 'id');
    }
}
