<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;
use App\Models\Ruta;
use App\Models\Viaje;
use App\Models\Venta;
class Viaje extends Model
{
    use HasFactory;
    protected $table = 'viajes';
    protected $fillable = [
        'fecha',
        'hora',
        'precio',
        'origen',
        'destino',
        'precio',
        'numero_carril',
        'buses_id',
        'tipo_bus'
    ];
    protected $casts = [
        'fecha' => 'datetime'  
    ];
    public function bus() {
    	return $this->belongsTo('App\Models\Bus', 'buses_id', 'id');
    }
    public function buses() {
    	return $this->belongsTo('App\Models\Bus', 'tipo_bus');
    }
    public function tieneruta() {
    	return $this->belongsTo('App\Models\Ruta', 'ruta_id');
    }
    public function tieneviaje() {
    	return $this->belongsTo('App\Models\Bus', 'buses_id');
    }
    public function ruta() {
    	return $this->belongsTo('App\Models\Bus', 'buses_id');
    }
    public function viajes() {
    	return $this->hasMany(Venta::class,'viaje_id');
    }
    
    public function viajescontrolar() {
    	return $this->belongsTo(Bus::class);
    }
    public function tienetipo() {
    	return $this->belongsTo('App\Models\Bus', 'tipo_bus');
    }

    public function controlarventas() {
    	return $this->hasMany(Venta::class, 'viaje_id');
    }
    
}
