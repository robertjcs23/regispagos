<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
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
        'parroquia_id'
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
}
