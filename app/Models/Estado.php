<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'descrip',
        'pais_id'
    ];
    public function pais(){
        return $this->belongsTo(Pais::class);
    }
}
