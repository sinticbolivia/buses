<?php

namespace App\Http\Controllers\Administracion;
use App\Models\Encomienda;
use Illuminate\Http\Request;
use Illuminate\Http\between;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class EncomiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $encomiendas = Encomienda::orderBy('created_at', 'desc')->paginate(4);
        
        $code = random_int(10000,100000);
        return view('app.administracion.encomiendas.index', [
            'search' => $request->search ?? '',
            'encomiendas' => Encomienda::orderBy('created_at', 'desc')
                
                ->search(array('remitente', 'destinatario', 'codigo'), $request->search ? $request->search : ''),
                
            'encomiendas' => $encomiendas,
            'code' => $code,
            
        ]);
        
        //return view('app.administracion.encomiendas.index')->with(['encomiendas'=> $encomienda, 'code'=> $code]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = 1;
        $code = $code+1;
        //$code =  '001-'.strtoupper(Str::random(5));
       // dd($code);
        return view('app.administracion.encomiendas.create')->with('code', $code);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $int = intval($request->cantidad);
        
        $request->validate([
            'fecha' => ['required'],
            'codigo' => ['required', 'min:5', 'max:10'],
            'origen' => ['required', 'min:5', 'max:50'],
            'destino' => ['required', 'min:5', 'max:50'],
           // 'fecha',
            'remitente' => ['required', 'min:5', 'max:50'],
            'destinatario' => ['required', 'min:5', 'max:50'],
           // 'cantidad' => ['required|integer|between:1,5'],
            'detalle' => ['required', 'min:3', 'max:50'],
           // 'telefono' => ['required', 'min:8', 'max:15'],
            'estado' => ['required', 'min:3', 'max:20'],
        ]);

        Encomienda::create([
            'codigo' => $request->codigo,
            'origen' => $request->origen,
            'destino'=> $request->destino,
            'fecha'=> $request->fecha,
            'remitente'=> $request->remitente,
            'destinatario' => $request->destinatario,
            'cantidad' => $request->cantidad,
            'detalle' => $request->detalle,
            'telefono' => $request->telefono,
            'estado' => $request->estado,
            'precio' => $request->precio
        ]);
        //$this->emit('registrada');
        session()->flash('success', 'encomienda registrado.');

        return redirect()->route('encomiendas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Encomienda $encomienda)
    {
        return view('app.administracion.encomiendas.show', [
            'encomienda' => $encomienda
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Encomienda $encomienda)
    {
        return view('app.administracion.encomiendas.edit', [
            'encomienda' => $encomienda
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encomienda $encomienda)
    {
        $request->validate([
            'fecha' => ['required'],
            'codigo' => ['required', 'min:5', 'max:10'],
            'origen' => ['required', 'min:5', 'max:50'],
            'destino' => ['required', 'min:5', 'max:50'],
           // 'fecha',
            'remitente' => ['required', 'min:5', 'max:50'],
            'destinatario' => ['required', 'min:5', 'max:50'],
            //'cantidad' =>,
            'detalle' => ['required', 'min:3', 'max:50'],
            //'telefono' => ['required', 'min:8', 'max:15'],
            'estado' => ['required', 'min:3', 'max:20']
          ]);

        $encomienda->update([
            'fecha' => $request->fecha,
            'codigo' => $request->codigo,
            'origen' => $request->origen,
            'destino'=> $request->destino,
            'remitente'=> $request->remitente,
            'destinatario' => $request->destinatario,
            'cantidad' => $request->cantidad,
            'detalle' => $request->detalle,
            'telefono' => $request->telefono,
            'estado' => $request->estado,
            'precio' => $request->precio
        ]);

        session()->flash('success', 'actualizado.');

        return redirect()->route('encomiendas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $encomienda = Encomienda::find( $request->id);
        $old = $encomienda;
          //  $bus->delete();
        if ( $encomienda->delete() ) {
          session()->flash('success', 'eliminado');
        } else {
          session()->flash('error', 'Lo siento no se pudo eliminar');
        }
        return redirect()->route('encomiendas');
    }
}
