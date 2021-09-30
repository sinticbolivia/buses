<?php

namespace App\Http\Controllers\Administracion;
use App\Models\Viaje;
use App\Models\Ruta;
use App\Models\Bus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $viaje=Viaje::with(['tieneviaje'])->get();
         //dd($viaje);
        $tipobus=Viaje::with(['tienetipo'])->get();
       // dd($tipobus);
        return view('app.administracion.viajes.index', [
          'search' => $request->search ?? '',
          'viajes' => Viaje::orderBy('created_at', 'desc')            
              ->search(array('fecha','hora', 'destino'), $request->search ? $request->search : '')
              ->paginate(4),        
          'viaje' => $viaje,
          'tipobus' => $tipobus
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$buses= Bus::all('id','placa');
        $asignados=Viaje::pluck('buses_id')->toArray();
        $asignadotipobus=Viaje::pluck('tipo_bus')->toArray();

        $resultado = array_merge($asignados, $asignadotipobus);
        $placas  = Bus::orderBy('placa', 'asc') 
             ->whereNotIn('id', $resultado) 
          ->get(); 
            
        $tipobus  = Bus::orderBy('tipo', 'asc') 
             ->whereNotIn('id', $resultado) 
          ->get();
          $fecha = Carbon::now();
          echo $fecha->toDateString();
       // $fecha = Viaje::where('fecha', '>=', \Carbon::now()->toDateTimeString());
         return view('app.administracion.viajes.create',[
              'placas' => $placas,
              'tipobus' =>$tipobus,
              'fecha' => $fecha
         ]);
       
       // return view('app.administracion.viajes.create')->with('buses', ['placa'=>$placas]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'fecha' => ['required'],
        'hora' => ['required'],
        'precio' => ['required'],
      // 'fecha',
        'origen' => ['required'],
        'destino' => ['required'],
       // 'numero_carril' => ['required'],
        'tipo_bus' => ['required']
      ]);
      $placa = Bus::find($request->bus_id)->get('placa')->last();
      $tipo_bus = Bus::find($request->tipo_bus)->get('tipo')->last();
      
      Viaje::create([
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'precio' => $request->precio,
        'origen' => $request->origen,
        'destino' => $request->destino,
        'numero_carril' => $request->numero_carril,
        'buses_id'=> $request->bus_id,//bus,
        //corregir bus_id o eliminar
        'bus_id'=> $request->bus_id,
        'tipo_bus' => $request->tipo_bus
      ]);

      session()->flash('success', 'viaje registrado.');

      return redirect()->route('viajes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Viaje $viaje)
    {
         return view('app.administracion.viajes.show', [
            'viaje' => $viaje
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    * @return \Illuminate\Http\Response
     */
    public function edit(Viaje $viaje)
    {
        return view('app.administracion.viajes.edit', [
            'viaje' => $viaje,
            'placas'=> Bus::where('id', $viaje->buses_id)->get()->last(),
            'tipobus' => Bus::where('id', $viaje->tipo_bus)->get()->last()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viaje $viaje)
    {
        $request->validate([
          'fecha' => ['required'],
          'hora' => ['required'],
          'precio' => ['required'],
        // 'fecha',
          'origen' => ['required'],
          'destino' => ['required'],
        //  'numero_carril' => ['required'],
          'tipo_bus' => ['required']
        ]);
        
          $viaje->update([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'precio' => $request->precio,
            'origen' => $request->origen,
            'destino' => $request->destino,
            'numero_carril' => $request->numero_carril,
            'tipo_bus' => $request->tipo_bus,
            'buses_id'=> $request->bus_id,//bus,

        ]);

        session()->flash('success', 'viaje actualizado.');

        return redirect()->route('viajes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $viaje = Viaje::find( $id);
          $old = $viaje;
            //  $bus->delete();
          if ( $viaje->delete() ) {
            session()->flash('success', 'eliminado');
          } else {
            session()->flash('error', 'Lo siento no se pudo eliminar');
          }
          return redirect()->route('viajes');
     
    }
}
