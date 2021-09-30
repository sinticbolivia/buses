<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Venta;
use App\Models\Viaje;
use App\Models\Boleto;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class VentaComponent extends Component
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
    public $precio;
    public $tipo;
    public $ruta_id; 

    public $show;
    public $cliente;
    public $mostrar_variable = 'Valor por defecto';

    public $lista;
    public $users;
    public $ventass;

    public function mount ($venta) {
        $this->show = false;
        $this->initValues();
        $this->venta_id = $venta;
        $this->getBoletos();
    }
    
    public function render()
    {
        $viajes = \App\Models\Viaje::with(['buses'])->orderBy('origen','asc')->get();
        $clientes = \App\Models\User::where('rol', 'cliente')->orderBy('apellidos','asc')->get();
        $ventas = Venta::with(['usuario', 'cliente','viaje'])->orderBy('created_at', 'desc')->get();
        
        return view('livewire.venta-component', [
            'viajes' => $viajes,
            'clientes' => $clientes,
            'ventas' => $ventas
        ]);
    }

    public function storeBoleto () {

        /**
         * Aqui la logica del cliente
         */
        $this->validate([
            'ci' => 'required',
            'nombres' => 'required|min:3|max:20',
            'apellidos' => 'required|min:3|max:25',
            'numero_asiento' => 'required'
        ]);
        if ($this->cliente_id == null || $this->cliente_id == 0) {
            $this->cliente = \App\Models\User::create([
                'ci' => $this->ci,
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'rol' => 'cliente',
                'email' => $this->ci.'expresotarija@gmail.com',
                'password' => Hash::make($this->ci)
            ]);
            $this->cliente = $this->cliente->id;
        }
        else{
            $this->cliente = $this->cliente_id;
        }

        $boleto = \App\Models\Boleto::create([
            'numero_asiento' => $this->numero_asiento,
            'precio' => $this->precio,
            'tipo' => $this->tipo,
            'cliente_id' => $this->cliente,
            'venta_id' => $this->venta_id,
            'viaje_id' => $this->ruta_id
        ]);

        $this->initValues();
        $this->show = false;

        $this->getBoletos();
    }
    public function newBoleto() {
        $this->show = true;
    }

    public function deleteBoleto($id)
    {
        Boleto::find($id)->delete();
        $this->getBoletos();
    }

    public function completarVenta (Boleto $boleto) {
        $precio_viaje = Viaje::where('id', $boleto->viaje_id)->get()->last();      
        $boleto->update([
            'tipo' => 'venta',
            'precio' => $precio_viaje->precio
        ]);

        $this->getBoletos();
        //$this->cambiar();
    }

    public function getBoletos () {
        $this->boletos = \App\Models\Boleto::with('cliente')->where('venta_id', $this->venta_id)->get();
    }

    protected function initValues () {
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

    public function cambiar () {
        $this->listarAsientos($this->ruta_id);
    }

    public function seleccionarAsiento ($numero) {
        $this->numero_asiento = $numero;
    }

    public function searchCi () {
        $this->buscarCi($this->ci);
    }

    public function buscarCi ($ci) {
        $user = User::where('ci', $ci)
            ->where('rol', 'cliente')->first();

        if ( $user != null ) {
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

    protected function listarAsientos ($id) {
        $viaje = Viaje::with('bus')->find($id); 
        $this->precio = $viaje->precio;
        
        $propiedades = [
            'filas' => $viaje->bus->fila + 1,
            'capacidad' => $viaje->bus->capacidad,
            'precio' => $viaje->precio,
            'gradas' => $viaje->bus->gradas,
            'gradas_posicion' => $viaje->bus->gradas_posicion,
            'tvs' => $viaje->bus->tvs,
            'tvs_posicion' => explode('-',$viaje->bus->filas)      
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

        for ( $fila = 1; $fila <= $propiedades['capacidad'] / $propiedades['filas'] + 3; $fila++ ){
            $asient = [];
            for ( $i = 1; $i <= $propiedades['filas']; $i++ ) {
                $isGrada = $fila == $propiedades['gradas_posicion'] && $i == 4 || $i == 5 && $fila == $propiedades['gradas_posicion'] ? true : false;
                $isTV = in_array ($fila, $propiedades['tvs_posicion'] )  ? true : false;
                
                if ( $numero < $propiedades['capacidad'] ) {
            
                    if ( $i === 3 ) {
                        array_push($asient, [
                            'numero' => null,
                            'ocupado' => false,
                            'reservado' => false,
                            'gradas' =>  false,
                            'pasillo' => true,                          
                            'tv' =>  $isTV ? true : false
                        ]);
                    } else {
                        array_push($asient, [
                            'numero' => $isGrada ? null : ++$numero,
                            'ocupado' => in_array($numero, $ocupados),
                            'reservado' => in_array($numero, $reservados),
                            'gradas' =>  $isGrada ? true : false,
                            'pasillo' => false,
                            'tv' =>  $isTV ? true : false
                        ]);
                    }                   
                }
                
            }
            array_push($asientos, $asient);
        }

        $this->asientos = $asientos;
        $this->propiedades = $propiedades;
    }
}
