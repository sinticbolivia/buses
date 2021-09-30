<?php

namespace App\Http\Controllers\pdf;
use App\Models\Bus;
use App\Models\Venta;
use App\Models\Viaje;
use App\Models\Boleto;
use App\Models\Encomienda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function imprimir()
    {      
        $ventas = Venta::with(['boletos.cliente','boletos.viaje', 'usuario'])
            ->whereDate('created_at', now()->format('Y-m-d'))->get();

        $pdf = \PDF::loadView('app.administracion.tickets.ticket', [
            'ventas' => $ventas
        ]);

        return $pdf->stream('ticket.pdf');
    }
    public function imprimirticket($id) //imprimir por pasajero
    {
        $boleto = Boleto::with(['cliente','viaje.bus.chofer1', 'venta.usuario'])->find($id);  

        $pdf = \PDF::loadView('app.administracion.tickets.ticket_pasajero', [
            'boleto' => $boleto
        ]);

        $pdf->setPaper(array(0, 0, 227, 453 ), 'portrait');
        
        return $pdf->stream('ticket.pdf');
    }

    public function imprimirVenta($id) // para imprimir pasajeros mas de 2 o individual desde la lista de ventas 
    {
        $venta = Venta::with(['boletos.cliente','boletos.viaje.bus.chofer1', 'usuario'])->find($id);  
        
        $pdf = \PDF::loadView('app.administracion.tickets.ticket_venta', [
            'venta' => $venta
        ]);
        
        $pdf->setPaper(array(0, 0, 227, 453), 'portrait');

        return $pdf->stream('ticket.pdf');
    }
    
    public function pdfencomienda ()
    {      
        $encomiendas = Encomienda::where('created_at', 'LIKE','%'.date_format(now(),'Y-m-d').'%')->get();
        
        $pdf = \PDF::loadView('app.administracion.tickets.listenc', compact('encomiendas'));
      
        return $pdf->stream('ticket.pdf');
    }
 
    public function imprimir_enc ($id)
    {
        $encomiendas = Encomienda::find($id);  
        
        $pdf = \PDF::loadView('app.administracion.tickets.tickenc', [
            'encomiendas' => $encomiendas
        ]);
        $pdf->setPaper(array(0, 0, 227, 453), 'portrait');
        
        return $pdf->stream('ticket.pdf');
    }
}
