<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = [
        'descrip',
        'estado_id'
    ];
    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
