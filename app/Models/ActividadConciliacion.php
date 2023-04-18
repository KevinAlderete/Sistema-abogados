<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class ActividadConciliacion extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'titulo',
        'descripcion',
        'direccion',
        'fecha',
        'hora',
        'id_expediente',
    ];

    // public function expediente(): HasOne
    // {
    //     return $this->hasOne(Expedientes::class, 'id', 'id_expediente');
    // }

    public function expediente(): BelongsTo
    {
        return $this->belongsTo(Expedientes::class, 'id_expediente', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'fecha' => $this->fecha,
        ];
    }
}
