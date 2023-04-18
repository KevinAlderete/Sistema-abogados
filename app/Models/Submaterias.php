<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Submaterias extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'nombre',
        'materia',
    ];

    public function expedientes(): BelongsToMany
    {
        return $this->belongsToMany(Expedientes::class, 'expediente_has_submaterias', 'id', 'id');
    }
    public function toSearchableArray()
    {
        return [
            'nombre' => $this->nombre,
            'materia' => $this->materia,
    ];
}
}
