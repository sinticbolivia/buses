<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Viaje;
use App\Models\Television;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'buses';
    protected $fillable = [
        'chofer',
        'chofer_id',
        'placa',
        'capacidad',
        'copiloto',
        'copiloto_id',
        'atributos',
        'imagen',
        'licencia',
        'licencia_copiloto',
        'marca',
        'color',
        'numerobus',
        'tipo',
        'fila',
        'gradas',
        'gradas_posicion',
        'tvs',
        'filas'
    ];
    public function usuarios() {
    	return $this->belongsTo('App\Models\User');
    }
    public function viaje() {
    	return $this->hasMany('App\Models\Viaje');
    }
    public function chofer1() {
    	return $this->belongsTo('App\Models\User', 'chofer_id');
    }
    public function copiloto1() {
    	return $this->belongsTo('App\Models\User', 'copiloto_id');
    }
    public function encomiendas() {
    	return $this->hasMany('App\Models\Encomienda');
    }
    public function televisiones() {
    	return $this->hasMany('App\Models\Television', 'bus_id');
    }
    
    public function controlviajes() {
    	return $this->hasMany(Viaje::class,'buses_id');
    }

    
}
