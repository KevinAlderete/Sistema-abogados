<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Caso_has_PContraria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_caso',
        'id_contraria',
    ];

    public function pContraria(): HasOne
    {
        return $this->hasOne(ParteContraria::class, 'id', 'id_contraria');
    }
}
