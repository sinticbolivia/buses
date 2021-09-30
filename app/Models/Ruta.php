<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Viaje;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = [
        'origen',
        'destino',
        'descripcion'
    ];
    public function viaje() {
    	return $this->hasOne('App\Models\Viaje');
    }
}
