<?php

namespace App\Http\Livewire\Steps;

use Livewire\Component;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;


class Step4 extends Component
{
    public $numero_tarjeta;
    public $nombre;
    public $fecha_expiracion;
    public $cvv;
    public $envio_email;

    private $apiContext;
   // protected $listener ['posAdd'];

    protected $rules = [
        'numero_tarjeta' => 'required',
        'nombre' => 'required',
        'fecha_expiracion' => 'required',
        'cvv' => 'required',
        'envio_email' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.steps.step4');
    }

    public function posAdd()
    {
        $this->validate();
        $this->emit('', [
            'numero_tarjeta' => $this->numero_tarjeta,
            'nombre' => $this->nombre,
            'fecha_expiracion' => $this->fecha_expiracion,
            'cvv' => $this->cvv,
            'envio_email' => $this->envio_email,
        ]);
    }
 
}
