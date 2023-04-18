<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasoDocumento extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'tipo_documento',
        'descripcion',
        'documento',
        'id_caso',
    ];
}
