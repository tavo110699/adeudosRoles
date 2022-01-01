<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'ApellidoP', 'ApellidoM', 'NumControl', 'Carrera'];

    public function scopeNombres($query, $Nombre)
    {
        if ($Nombre) {
            return $query->where('Nombre', 'like', "%$Nombre%");
        }
    }
}
