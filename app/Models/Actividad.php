<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Actividad extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'titulo',
        'descripcion',
        'direccion',
        'fecha',
        'hora',
    ];

    public function toSearchableArray()
    {
        return [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'fecha' => $this->fecha,
        ];
    }
}
