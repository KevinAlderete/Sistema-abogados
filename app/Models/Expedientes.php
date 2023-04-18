<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Expedientes extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'n_expediente',
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

    public function submaterias(): BelongsToMany
    {
        return $this->belongsToMany(Submaterias::class, 'expediente_has_submaterias', 'id_expediente', 'id_submateria');
    }

    public function conActividades(): HasMany
    {
        return $this->hasMany(ActividadConciliacion::class, 'id_expediente', 'id');
    }

    public function toSearchableArray()
    {
        return [
            'n_expediente' => $this->n_expediente,
            'estado' => $this->estado,
    ];
}
}
