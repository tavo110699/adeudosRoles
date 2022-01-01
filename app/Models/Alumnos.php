<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'ApellidoP','ApellidoM','NumControl','carreraid'];

    public function getCarrera(){
        return $this->belongsTo('App\Models\Carreras', 'carreraid','id');
    }

}
