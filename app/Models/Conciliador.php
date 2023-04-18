<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Conciliador extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'dni',
        'nombre',
    ];

    public function toSearchableArray()
    {
        return [
            'dni' => $this->dni,
            'nombre' => $this->nombre,
    ];
}
}
