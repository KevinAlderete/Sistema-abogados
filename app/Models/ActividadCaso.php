<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class ActividadCaso extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'titulo',
        'descripcion',
        'direccion',
        'fecha',
        'hora',
        'id_caso',
    ];

    public function caso(): BelongsTo
    {
        return $this->belongsTo(Casos::class, 'id_caso', 'id');
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
