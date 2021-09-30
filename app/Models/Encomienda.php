<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomienda extends Model
{
    use HasFactory;
    protected $table = 'encomiendas';
    protected $fillable = [
        'codigo',
        'origen',
        'destino',
        'fecha',
        'remitente',
        'destinatario',
        'cantidad',
        'detalle',
        'telefono',
        'estado',
        'precio'
    ];
    protected $casts = [
        'fecha' => 'datetime',
        'cantidad' => 'integer',
    ];
    public function usuario() {
    	return $this->belongsTo('App\Models\User');
    }
}
