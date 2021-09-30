<?php

namespace App\Http\Livewire;

use App\Models\Venta;
use Livewire\Component;

class FormBySteps extends Component
{
    public $venta;
    public $currentTrip;
    public $quantitySeats;
    public $customer;

    protected $listeners = ['setCurrentTrip', 'setCustomerData'];

    public function render()
    {
        $this->venta = Venta::create([
            'viaje_id' => null,
            'usuario_id' => 1,
        ]);

        return view('livewire.form-by-steps', [
            'venta' => $this->venta,
        ]
        )->layout('layouts.guest');
    }

    public function incrementPostCount()
    {
        $this->postCount = Post::count();
    }

    public function setCurrentTrip($trip, $quantitySeats)
    {
        $this->currentTrip = $trip;
        $this->quantitySeats = $quantitySeats;
    }

    public function setCustomerData($customer)
    {
        $this->customer = $customer;
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

        return $result;
    }
}
