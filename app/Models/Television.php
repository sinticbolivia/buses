<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bus;
class Television extends Model
{
    use HasFactory;
    protected $fillable = [
        'TV', 'fila'
    ];
    public function bus() {
    	return $this->belongsTo('App\Models\Bus', 'bus_id');
    }
}
