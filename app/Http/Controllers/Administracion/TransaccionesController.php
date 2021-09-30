<?php
namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Gateways\Libelula;

class TransaccionesController extends Controller
{
	public function default()
	{
		$fi = date('Y-m-') . '01' . ' 00:01:00';
		$ff = date('Y-m-') . date('t') . ' 23:59:59';
		//var_dump($fi, $ff);
		$key = 'aa5bc37a-14a3-5934-b2e9-bec7777cd4d8';
		$libelula 	= new Libelula($key);
		$res 		= $libelula->getTransacciones($fi, $ff);
		$pagos 	= $res->datos;
		//print_r($res);
		
		return view('app.administracion.transacciones.index', get_defined_vars());
	}
}