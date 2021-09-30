<?php

namespace App\Http\Livewire\Steps;

use Livewire\Component;

class Step2 extends Component
{
    public $name;
    public $lastname;
    public $identification;
    public $email;
    public $invoiceName;
    public $nit;

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'identification' => 'required',
        'email' => 'required|email',
        'invoiceName' => 'required',
        'nit' => 'required',
    ];

    public function render()
    {
        return view('livewire.steps.step2');
    }

    public function submitForm()
    {
        $this->validate();
        $this->emit('setCustomerData', [
            'name' => $this->name,
            'lastname' => $this->lastname,
            'identification' => $this->identification,
            'email' => $this->email,
            'invoiceName' => $this->invoiceName,
            'nit' => $this->nit,
        ]);

    }
}
