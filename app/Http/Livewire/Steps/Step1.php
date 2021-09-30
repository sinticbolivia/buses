<?php

namespace App\Http\Livewire\Steps;

use App\Models\Viaje;
use Livewire\Component;

class Step1 extends Component
{
    public $origin;
    public $destination;
    public $departureDate;
    public $quantityPassengerSeats;
    public $trips;
    protected $rules = [
        'origin' => 'required',
        'destination' => 'required',
        'departureDate' => 'required',
        'quantityPassengerSeats' => 'required',
    ];

    public function render()
    {
        return view('livewire.steps.step1');
    }

    public function submitForm()
    {
        $this->validate();

        $this->trips = Viaje::with('bus')->where('origen', $this->origin)
            ->where('destino', $this->destination)->where('fecha', $this->departureDate)
            ->get();
    }

    public function setCurrentTrip($currentTrip)
    {
        $this->emit('setCurrentTrip', $currentTrip, $this->quantityPassengerSeats);
    }

    public function red()
    {
        return redirect()->route('/ ');
    }

    public function libelula()
    {
        $url="http://www.todotix.com:10888/rest/deuda/registrar:";

        $data = array(
            'appkey' => 'valor1',
            'email_cliente' => '',
            'identificador_deuda' => '',
            'lineas_detalle_deuda' => array('cantidad' => 1,
                                            'concepto' => 'prueba',
                                            'costo_unitario' => 80,
                                            )
        );
        //create a new cURL resource
        $ch = curl_init($url);

        //setup request to send json via POST
        /* $data = array(
            'username' => 'codexworld',
            'password' => '123456'
        ); */
        $payload = json_encode(array($data));

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        //close cURL resource
        curl_close($ch);

        //return $result;
        //return view('/', compact ('result'));
        return redirect()->route('/', ['resutkl' => $result]);
    }
}
