<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'fecha_r',
        'fecha_p',
        'referencia',
        'monto',
        'detalle',

        'empleado_id',
        'cliente_id',
        'tpago_id'
    ];
    
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function tpago(){
        return $this->belongsTo(Tpago::class);
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}