<?php

namespace App\Http\Controllers\Administracion;
use App\Models\Bus;
use App\Models\User;
use App\Models\Viaje;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     
        //$buses = Bus::all();
        return view('app.administracion.buses.index', [
            'search' => $request->search ?? '',
            'buses' => Bus::orderBy('created_at', 'desc')            
                ->search(array('placa', 'tipo', 'chofer1.rol.chofer'), $request->search ? $request->search : '')
                ->paginate(5)
           // 'buses' => $buses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignados=Bus::pluck('chofer_id')->toArray();//array 1 //funciones acumulativas pluck recupera id chofer
    
        $asignadoscopiloto=Bus::pluck('copiloto_id')->toArray(); //array 2
        $resultado = array_merge($asignados, $asignadoscopiloto);
        //para chofer
        $choferes  = User::orderBy('apellidos', 'asc') //ordenando orderBy = ordenar por
            ->whereNotIn('id', $resultado) //donde no este en la columna 
            ->where('rol', 'chofer')->get(); //donde el rol = chofer get devolver
           //para copiloto
        $copiloto  = User::orderBy('apellidos', 'asc') //ordenando orderBy = ordenar por
           ->whereNotIn('id', $resultado) //donde no este en la columna 
           ->where('rol', 'copiloto')->get(); //donde el rol = chofer get devolver
     
        return view('app.administracion.buses.create',[
            'copiloto' =>$copiloto,
            'choferes' => $choferes                        
        ]);
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
            'chofer' => ['required'],
            //'chofer_id' => ['required'],
            'placa' => ['required', 'min:5', 'max:15', Rule::unique('buses')],
            'copiloto' => ['required'],
            //'copiloto_id' => ['required'],
            //'atributos' => ['required', 'min:3', 'max:150'],
           //'imagen' => ['required|mimes:jpeg,png,jpg,gif,svg|max:2048'],  
          //  'imagen' => 'required|mimes:jpg,jpeg,png',        
            'tipo' => ['required'],
            'fila' =>['required'],
            'gradas' => ['required'],
            'gradas_posicion' => ['required'],
            'tvs' => ['required'],
            'capacidad' => ['required']
        ]);
        $img ='';
            if($request->hasFile('imagen')){
                $file= $request->file("imagen");
                $archivo = $file->getClientOriginalName();
                $file->move(public_path('/imagen'), $archivo);
                $img = "/imagen/".$archivo;                        
            }
        //dd($img);
        Bus::create([
            'chofer' => '',
            'chofer_id'=>$request->chofer,
            'placa' => $request->placa,
            'capacidad' => $request->capacidad,
            'copiloto' => '',
            'copiloto_id' =>$request->copiloto,
            'atributos' => $request->atributos,
            'imagen' => $img,
            'licencia' => $request->licencia,
            'licencia_copiloto' => $request->licencia_copiloto,
            'marca' => $request->marca,
            'color' => $request->color,
            'numerobus' => $request->numerobus,
            'tipo' => $request->tipo,
            'fila' => $request->fila,
            'gradas' => $request->gradas,
            'gradas_posicion' => $request->gradas_posicion,
            'tvs' => $request->tvs,
            'filas' => $request->filas
        ]);
        session()->flash('success', 'Bus registrado.');

        return redirect()->route('buses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        return view('app.administracion.buses.show', [
            'bus' => $bus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        //dd($bus);
        $busbus=Bus::where('id', '=', $bus->id)->get()->last();
        $asignados=Bus::where('id', '<>', $bus->id)->pluck('chofer_id')->toArray();//array 1 //funciones acumulativas pluck recupera id chofer
       
        //para chofer);
        $asignadoscopiloto=Bus::where('id', '<>', $bus->id)->pluck('copiloto_id')->toArray(); //array 2
        $resultado = array_merge($asignados, $asignadoscopiloto);
        $choferes  = User::orderBy('apellidos', 'asc') //ordenando orderBy = ordenar por
            ->whereNotIn('id', $resultado) //donde no este en la columna 
            ->where('rol', 'chofer')->get(); //donde el rol = chofer get devolver
           // para copiloto;
        $copiloto  = User::orderBy('apellidos', 'asc') //ordenando orderBy = ordenar por
           ->whereNotIn('id', $resultado) //donde no este en la columna 
           ->where('rol', 'copiloto')->get(); //donde el rol = chofer get devolver
      
        return view('app.administracion.buses.edit')->with('usuarios', 
            ['chofer'=>$choferes, 'copiloto'=>$copiloto, 'bus'=>$busbus]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'chofer' => ['required'],
            //'chofer_id' => ['required'],
            'placa' => ['required', 'min:5', 'max:15'],
            'copiloto' => ['required'],
            //'copiloto_id' => ['required'],
            //'atributos' => ['required', 'min:3', 'max:150'],
            'tipo' => ['required'],
            'fila' => ['required'],
            'gradas' => ['required'],
            'gradas_posicion' => ['required'],
            'tvs' => ['required'],
            'filas' => ['required']
        ]);

        $bus->update([
            'chofer' => '',
            'chofer_id' => $request->chofer,
            'placa' => $request->placa,
            'capacidad' => $request->capacidad,
            'copiloto' => '',
            'copiloto_id' => $request->copiloto,
            'atributos' => $request->atributos,
            'licencia' => $request->licencia,
            'licencia_copiloto' => $request->licencia_copiloto,
            'marca' => $request->marca,
            'color' => $request->color,
            'numerobus' => $request->numerobus,
            'tipo' => $request->tipo,
            'fila' => $request->fila,
            'gradas' => $request->gradas,
            'gradas_posicion' => $request->gradas_posicion,
            'tvs' => $request->tvs,
            'filas' => $request->filas

        ]);

        session()->flash('success', 'Bus actualizado.');

        return redirect()->route('buses');
    }

    /**
     * Remove the specified resource from storage.
     *s
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //protected $listeners = [
    //    'deleteRow' => 'destroy'
    //];
    public function destroy($id)
    {
        //dd($request);
        $bus = Bus::find( $id);
        $old = $bus;
          //  $bus->delete();
        if ( $bus->delete() ) {
          session()->flash('success', 'Bus eliminado');
        } else {
          session()->flash('error', 'Lo siento no se pudo eliminar el bus');
        }
        return redirect()->route('buses');
    }
}
