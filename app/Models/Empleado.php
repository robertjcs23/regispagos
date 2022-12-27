<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'direccion',

        'pais_id',
        'estado_id',
        'ciudad_id',
        'parroquia_id',
        'cargo_id',
        'role_id'
    ];
    
    public function pais(){
        return $this->belongsTo(Pais::class);
    }
    public function estado(){
        return $this->belongsTo(Estado::class);
    }
    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
    public function parroquia(){
        return $this->belongsTo(Parroquia::class);
    }
    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
