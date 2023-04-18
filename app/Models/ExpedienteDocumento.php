<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedienteDocumento extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'tipo_documento',
        'n_acta',
        'folio',
        'tipo_acta',
        'descripcion',
        'documento',
        'id_expediente',
    ];
}
