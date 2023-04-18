<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class expediente_has_invitado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_expediente',
        'id_invitado',
    ];

    public function invitado(): HasOne
    {
        return $this->hasOne(InvitadoConciliacion::class, 'id', 'id_invitado');
    }
}
