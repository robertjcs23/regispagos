<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    protected $fillable = [
        'descrip',
        'ciudad_id'
    ];
    public function ciudad(){
        return $this->belongsTo(Estado::class);
    } 
}
