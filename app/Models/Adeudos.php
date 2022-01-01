<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adeudos extends Model
{
    use HasFactory;
    protected $fillable = ['idUser','idDepartamento', 'idAlumno','descripcion'];

    public function getUser(){
        return $this->belongsTo('App\Models\User', 'idUser','id');
    }

    public function getDepartamento(){
        return $this->belongsTo('App\Models\Departamentos', 'idDepartamento','id');
    }

    public function getAlumno(){
        return $this->belongsTo('App\Models\Alumnos', 'idAlumno','id');
    }

}
