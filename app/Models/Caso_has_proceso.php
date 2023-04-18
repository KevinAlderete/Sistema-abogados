<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Caso_has_proceso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_caso',
        'id_proceso',
    ];

    public function procesos(): HasOne
    {
        return $this->hasOne(TipoProceso::class, 'id', 'id_proceso');
    }
}
