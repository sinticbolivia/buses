<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Viaje;
use App\Models\Boleto;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        //'numero_boleto',
        //'precio',
        //'tipo',
        //'numero_asiento',
        'usuario_id',
        //'cliente_id',
        'viaje_id',
        'tipo_bus'   
    ];
    
    public function usuario() {
    	return $this->belongsTo(User::class, 'usuario_id');
    }   
    public function cliente() {
    	return $this->belongsTo(User::class, 'cliente_id');
    }
    public function viaje() {
    	return $this->belongsTo(Viaje::class, 'viaje_id');
    }

    public function boletos () {
        return $this->hasMany(Boleto::class, 'venta_id', 'id');
    } 
    
    public function ventascontrolar() {
    	return $this->belongsTo(Viaje::class);
    }
}
