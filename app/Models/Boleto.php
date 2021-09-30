<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Venta;
use App\Models\Viaje;

class Boleto extends Model
{
    use HasFactory;

    protected $table = 'boletos';
    
    protected $fillable = [
        'numero_asiento', 'precio', 'tipo', 'cliente_id', 'venta_id', 'viaje_id'
    ];

    public function cliente () {
        return $this->belongsTo(User::class, 'cliente_id', 'id');
    }

    public function venta () {
        return $this->belongsTo(Venta::class, 'venta_id', 'id');
    }

    public function viaje () {
        return $this->belongsTo(Viaje::class, 'viaje_id', 'id');
    }
}
