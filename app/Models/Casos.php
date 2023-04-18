<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Casos extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'n_caso',
        'fecha_inicio',
        'fecha_final',
        'descripcion',
        'estado',
        'id_cliente',
    ];


    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'n_caso' => $this->n_caso,
            'estado' => $this->estado,
    ];
}
}
