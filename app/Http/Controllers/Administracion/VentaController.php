<?php

namespace App\Http\Controllers\Administracion;

use App\Models\Venta;
use App\Models\User;
use App\Models\Bus;
use App\Models\Ruta;
use App\Models\Viaje;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {  
        
        return view('app.administracion.ventas.index', [
            
            'search' => $request->search ?? '',
            'ventas' => Venta::with(['usuario', 'boletos.cliente', 'boletos.viaje.bus'])->orderBy('created_at', 'desc')
                ->search(
                    array(
                        'boletos.numero_asiento',
                        //'boletos.cliente.nombres',
                        //'boletos.cliente.apellidos',
                        //'boletos.cliente.ci'
                    ), 
                    $request->search ? $request->search : ''
                )
                ->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$viajes = Viaje::with(['buses'])->orderBy('origen','asc')->get();
        //$clientes = User::where('rol', 'cliente')->orderBy('apellidos','asc')->get();
        //$numero = random_int(100000,1000000);
        
        $venta = Venta::create([
          //  'numero_boleto' => $request->numero_boleto, //en create
            //'precio' => $request->precio, //creat

            //'tipo' => $request->tipo,
            //'numero_asiento' => $request->numero_asiento,
            'usuario_id' => '',

            //'cliente_id' => $request->cliente_id,//creatt
            
            'viaje_id' => $request->viaje_id,
            'usuario_id' => auth()->id()
        ]);

        return view('app.administracion.ventas.create',[
            'venta' => $venta,
           // 'viajes' => $viajes,
            //'clientes' => $clientes,
            //'numero' => $numero,
        ]);

        //$viajes = Viaje::with(['buses'])->orderBy('origen','asc')->get();
        //$clientes = User::where('rol', 'cliente')->orderBy('apellidos','asc')->get();
        //$numero = random_int(100000,1000000);
        //return view('app.administracion.ventas.create',[
          //  'viajes' => $viajes,
            //'clientes' => $clientes,
            //'numero' => $numero,
           // 'buses' => $buses
        //]);
    
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
           // 'numero_boleto' => ['required'],
          // 'precio' => ['required'],
          //  'tipo' => ['required'],
           // 'fecha',
          //  'numero_asiento' => ['required'],
            'tipo_bus' => ['tipo_bus'],
            'ci' => ['required'],
            'nombres' => ['required'],
            'apellidos' => ['required'],

        ]);

        /**
         * Esto copiar implementar en livewire    
         */
        if ($request->cliente_id == null || $request->cliente_id == 0) {
            $cliente = User::create([
                'ci' => $request->ci,
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'rol' => 'cliente',
                'email' => $request->ci.'expresotarija@gmail.com',
                'password' => Hash::make($request->ci)
            ]);
            $cliente = $cliente->id;
        }
        else{
            $cliente = $request->cliente_id;
        }

        /**
         * Termina aqui
         */

        $venta = Venta::create([
            //'numero_boleto' => $request->numero_boleto,
           // 'precio' => $request->precio,
           // 'tipo' => $request->tipo,
           // 'numero_asiento' => $request->numero_asiento,
            'usuario_id' => '',
           // 'cliente_id' => $cliente,
            
            'viaje_id' => $request->viaje_id,
            'usuario_id' => auth()->id()
        ]);
        session()->flash('success', 'registrado exitosamente.');
        return redirect()->route('ventas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
       // $venta = Venta::all();
      //  $users = User::where('rol', 'administrador')->orWhere('rol','cliente')->get();
       // $venta = Venta::with(['cliente', 'usuario','viaje'])->orderBy('created_at', 'desc')->get();

        return view('app.administracion.ventas.show', [
            'venta' => $venta,
           // 'users' => 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $venta = Venta::find($venta->id);
       // dd($venta);
        $clientes = User::where('id', $venta->cliente_id)->get()->last();
        //dd($clientes);
        $usuarios = User::where('id', $venta->usuario_id)->get()->last();
        //dd($usuarios);
        $viaje = Viaje::where('id', $venta->viaje_id)->get()->last();
       
        return view('app.administracion.ventas.edit', [
            'venta' => $venta,
           'clientes'=> $clientes, // User::where('id', $venta->usuario_id)->get()->last()
            'usuarios' => $usuarios,
            'viaje' => $viaje
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $request->validate([
           // 'numero_boleto' => ['required'],
           // 'precio' => ['required'],
           // 'tipo' => ['required'],
           // 'fecha',
           // 'numero_asiento' => ['required']
          ]);
        //dd($request);
        $venta->update([
          //  'numero_boleto' => $request->numero_boleto,
          //  'precio' => $request->precio,
          //  'tipo' => $request->tipo,
          //  'numero_asiento' => $request->numero_asiento,
          // 'usuario_id' => '',
           //'cliente_id' => $request->cliente_id,
            
            //'cliente_id' => '',
            
           // 'viaje_id' => '',
            'viaje_id' => $request->viaje_id,
            'usuario_id' => auth()->id(),
        ]);

        session()->flash('success', 'venta actualizado.');

        return redirect()->route('ventas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $venta = Venta::find($request->id);
        $old = $venta;

        if ( $venta->delete() ) {
            session()->flash('success', 'eliminado');
        } else {
            session()->flash('error', 'Lo siento no se pudo eliminar');
        }

        return redirect()->route('ventas');
        
    }
    public function buscarCi($ci)
    {
        $cliente = User::where('rol', 'cliente')->where('ci', $ci)->first();

        return response()->json([
            'status' => 201,
            'message' => $cliente ? 'existe' : 'no existe',
            'data' => $cliente
        ]); 
    }
    public function consultaAsientos($id){
        $viaje = Viaje::with('bus')->find($id); 
        
        $propiedades = [
            'filas' => $viaje->bus->fila + 1,
            'capacidad' => $viaje->bus->capacidad,
            'precio' => $viaje->precio,
            'gradas' => $viaje->bus->gradas,
            'gradas_posicion' => $viaje->bus->gradas_posicion
        ];
        $ocupados = Venta::where('viaje_id', $id)->where('tipo','venta')->where('created_at', 'like', '%'.date_format(now(), 'Y-m-d').'%')->get()->pluck('numero_asiento')->toArray();
        $reservados = Venta::where('viaje_id', $id)->where('tipo', 'reserva')->where('created_at', 'like', '%'.date_format(now(), 'Y-m-d').'%')->get()->pluck('numero_asiento')->toArray();
        
        $asientos = [];
        $numero = 0;

        for ( $fila = 1; $fila <= $propiedades['capacidad'] / $propiedades['filas'] + 3; $fila++ ){
            $asient = [];
            for ( $i = 1; $i <= $propiedades['filas']; $i++ ) {
                $isGrada = $fila == $propiedades['gradas_posicion'] && $i == 4 || $i == 5 && $fila == $propiedades['gradas_posicion'] ? true : false;
                if ( $numero < $propiedades['capacidad'] ) {
            
                    if ( $i === 3 ) {
                        array_push($asient, [
                            'numero' => null,
                            'ocupado' => false,
                            'reservado' => false,
                            'gradas' =>  false,
                            'pasillo' => true
                        ]);
                    } else {
                        array_push($asient, [
                            'numero' => $isGrada ? null : ++$numero,
                            'ocupado' => in_array($numero, $ocupados),
                            'reservado' => in_array($numero, $reservados),
                            'gradas' =>  $isGrada ? true : false,
                            'pasillo' => false
                        ]);
                    }
                    
                }
                    /*for ( $i = 1; $i <= $propiedades['capacidad']; $i++ ) {
                        array_push($asientos, [
                            'numero' => $i,
                            'ocupado' => in_array($i, $ocupados),
                            'reservado' =>in_array($i, $reservados)
                        ]);
                    }*/
            }
            array_push($asientos, $asient);
        }
        $data = [
            'propiedades' => $propiedades,
            'asientos' => $asientos
        ];
        return response()->json([
            $data
        ]);
    }
}
