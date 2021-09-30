<?php

namespace App\Http\Livewire\Steps;

use App\Models\Boleto;
use App\Models\User;
use App\Models\Venta;
use App\Models\Viaje;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Http\Gateways\Libelula;

class Step3 extends Component
{
    public $venta_id;
    public $boletos;
    public $asientos;
    public $propiedades;
    public $rutas;

    public $cliente_id;
    public $ci;
    public $nombres;
    public $apellidos;
    public $numero_asiento;
    public	$asientos_seleccionados = [];
    public $precio;
    public $tipo;
    public $ruta_id;

    public $show;
    public $cliente;
    public $mostrar_variable = 'Valor por defecto';

    public $lista;
    public $users;
    public $ventass;

    public $currentTrip;
    public $quantitySeats;
    public $customer;

    public $reservas;
    public $precio1;

    protected $listeners = ['setCurrentTrip', 'setCustomerData'];

    public function render()
    {
        $viajes = Viaje::with(['buses'])->orderBy('origen', 'asc')->get();
        $clientes = User::where('rol', 'cliente')->orderBy('apellidos', 'asc')->get();
        $ventas = Venta::with(['usuario', 'cliente', 'viaje'])->orderBy('created_at', 'desc')->get();

        return view('livewire.steps.step3'
            , [
                'viajes' => $viajes,
                'clientes' => $clientes,
                'ventas' => $ventas,
            ]
        );

    }
    public function mount($venta)
    {
        $this->show = true;
        $this->initValues();
        $this->venta_id = $venta;
        $this->getBoletos();
        $this->reserva();
    }

    public function storeBoleto()
    {
        $this->validate([
            'precio' => 'required',
            'ci' => 'required|min:7|max:15',
            'nombres' => 'required|min:3|max:25',
            'apellidos' => 'required|min:3|max:20',
        ]);
        if ($this->cliente_id == null || $this->cliente_id == 0) {
            $this->cliente = User::create([
                'ci' => $this->ci,
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'rol' => 'cliente',
                'email' => $this->ci . 'expresotarija@gmail.com',
                'password' => Hash::make($this->ci),
            ]);
            $this->cliente = $this->cliente->id;
        } else {
            $this->cliente = $this->cliente_id;
        }

        $boleto = Boleto::create([
            'numero_asiento' => $this->numero_asiento,
            'precio' => $this->precio,
            'tipo' => $this->tipo,
            'cliente_id' => $this->cliente,
            'venta_id' => $this->venta_id,
            'viaje_id' => $this->ruta_id,
        ]);

        $this->initValues();
        $this->show = false;

        $this->getBoletos();

        
    }

    public function deleteBoleto($id)
    {
        Boleto::find($id)->delete();
        $this->getBoletos();
    }

    public function completarVenta(Boleto $boleto)
    {
        $boleto->update([
            'tipo' => 'venta',
        ]);

        $this->getBoletos();
        //$this->cambiar();
    }

    public function getBoletos()
    {
        $this->boletos = Boleto::with('cliente')->where('venta_id', $this->venta_id)->get();
    }

    protected function initValues()
    {
        $this->numero_asiento = 0;
        $this->precio = 0;
        $this->tipo = 'venta';
        $this->cliente_id = null;
        $this->ci = '';
        $this->nombres = '';
        $this->apellidos = '';
        $this->cliente_id = null;
        $this->ci = '0';
        $this->ruta_id = null;
        $this->asientos = [];
    }

    public function cambiar()
    {
        $this->listarAsientos($this->ruta_id);
    }

    public function seleccionarAsiento($numero)
    {
    	if( count($this->asientos_seleccionados) >= $this->quantitySeats )
    		return;
    	if( in_array( $numero, $this->asientos_seleccionados) )
    		return;
    	$this->asientos_seleccionados[] = $numero;
        $this->numero_asiento = implode(',', $this->asientos_seleccionados);
        
    }

    public function searchCi()
    {
        $this->buscarCi($this->ci);
    }

    public function buscarCi($ci)
    {
        $user = User::where('ci', $ci)
            ->where('rol', 'cliente')->first();

        if ($user != null) {
            $this->cliente_id = $user->id;
            $this->ci = $user->ci;
            $this->nombres = $user->nombres;
            $this->apellidos = $user->apellidos;
        } else {
            $this->cliente_id = null;
            $this->nombres = '';
            $this->apellidos = '';
        }
    }

    protected function listarAsientos($id)
    {
        $viaje = Viaje::with('bus')->find($id);
        $this->precio = $viaje->precio;

        $propiedades = [
            'filas' => $viaje->bus->fila + 1,
            'capacidad' => $viaje->bus->capacidad,
            'precio' => $viaje->precio,
            'gradas' => $viaje->bus->gradas,
            'gradas_posicion' => $viaje->bus->gradas_posicion,
            'tvs' => $viaje->bus->tvs,
            'tvs_posicion' => explode('-', $viaje->bus->filas),
        ];

        $ocupados = Boleto::where('viaje_id', $id)
            ->where('tipo', 'venta')
        // ->where('created_at', 'like', '%'.date_format(now(), 'Y-m-d').'%')
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->get()
            ->pluck('numero_asiento')->toArray();

        $reservados = Boleto::where('viaje_id', $id)
            ->where('tipo', 'reserva')
        // ->where('created_at', 'like', '%'.date_format(now(), 'Y-m-d').'%')
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->get()
            ->pluck('numero_asiento')->toArray();

        $asientos = [];
        $numero = 0;

        for ($fila = 1; $fila <= $propiedades['capacidad'] / $propiedades['filas'] + 3; $fila++) {
            $asient = [];
            for ($i = 1; $i <= $propiedades['filas']; $i++) {
                $isGrada = $fila == $propiedades['gradas_posicion'] && $i == 4 || $i == 5 && $fila == $propiedades['gradas_posicion'] ? true : false;
                $isTV = in_array($fila, $propiedades['tvs_posicion']) ? true : false;

                if ($numero < $propiedades['capacidad']) {

                    if ($i === 3) {
                        array_push($asient, [
                            'numero' => null,
                            'ocupado' => false,
                            'reservado' => false,
                            'gradas' => false,
                            'pasillo' => true,
                            'tv' => $isTV ? true : false,
                        ]);
                    } else {
                        array_push($asient, [
                            'numero' => $isGrada ? null : ++$numero,
                            'ocupado' => in_array($numero, $ocupados),
                            'reservado' => in_array($numero, $reservados),
                            'gradas' => $isGrada ? true : false,
                            'pasillo' => false,
                            'tv' => $isTV ? true : false,
                        ]);
                    }
                }

            }
            array_push($asientos, $asient);
        }

        $this->asientos = $asientos;
        $this->propiedades = $propiedades;
    }

    public function setCurrentTrip($trip, $quantitySeats)
    {
        $this->currentTrip = $trip;
        $this->quantitySeats = $quantitySeats;
        $this->ruta_id = $trip;
        $this->viajes = Viaje::with('bus')->whereIn('id', [$trip])->get();
        $this->cambiar();
    }

    public function setCustomerData($customer)
    {
        $this->customer = $customer;
    }
    public function reserva(){
        $this->reservas = $this->tipo;
        /* 
        if($this->reservas == 'reserva'){
            $this->precio1 = $this->precio;
        }else{
            $this->precio = 150; //$this->precio1;
        }
        */
    }
    public function seleccionarTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    //metodo de pago libelula
    public function libelula()
    {
    	//print_r($this->customer);die;
    	$fecha_expiracion = new \DateTime();
    	$fecha_expiracion->add(new \DateInterval('P1D'));
    	
        $appkey = 'aa5bc37a-14a3-5934-b2e9-bec7777cd4d8';
        $data = array(
        	'callback_url'			=> route('libelula_callback'),
        	'url_retorno'			=> route('libelula_retorno'),
            'email_cliente' 		=> $this->customer['email'],
            'identificador_deuda' 	=> str_pad($this->venta_id, 6, '0', STR_PAD_LEFT),
        	'fecha_vencimiento'		=> $fecha_expiracion->format('Y-m-d'),
            'descripcion'			=> 'Pago Compra Online',
            'nombre_cliente' 		=> $this->customer['name'],
            'apellido_cliente' 		=> $this->customer['lastname'],
            'numero_documento' 		=> $this->customer['identification'],
            'tipo_factura' 			=> '0', //Servicios
            //'emite_factura'			=> 1,
            //'razon_social' 			=> '',
            'moneda'				=> 'BOB',
            'lineas_detalle_deuda'	=> [
            	[
            		'cantidad' 			=> $this->quantitySeats,
            		'concepto' 			=> 'Compra de pasajes (bus)',
            		'costo_unitario' 	=> (float)$this->precio, // * (int)$this->quantitySeats,
            		'codigo_producto' 	=> 'PB-0001',
            		
            	]
            ]
        );
        try
        {
        	$libelula = new Libelula($appkey);
        	$libelula->setData($data);
        	$res = $libelula->crearDeuda();
        	return redirect($res->getLink());
        }
        catch(\Exception $e)
        {
        	session()->flash('error', $e->getMessage());
        	return null;
        }
        
    }

    //evento

}
