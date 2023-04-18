<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Expediente_has_submateria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_expediente',
        'id_submateria',
    ];

    public function submaterias(): HasOne
    {
        return $this->hasOne(Submaterias::class, 'id', 'id_submateria');
    }
    public function expediente(): BelongsTo
    {
        return $this->belongsTo(Expedientes::class, 'id_expediente', 'id');
    }
}
