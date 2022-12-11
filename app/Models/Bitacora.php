<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'administrador_id',
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

}
