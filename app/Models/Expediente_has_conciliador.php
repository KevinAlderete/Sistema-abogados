<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Expediente_has_conciliador extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_expediente',
        'id_conciliador',
    ];

    public function conciliador(): HasOne
    {
        return $this->hasOne(Conciliador::class, 'id', 'id_conciliador');
    }
}
