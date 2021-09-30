<?php

namespace App\Http\Controllers\Administracion;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruta = Ruta::all();
        return view('app.administracion.rutas.index')->with('rutas', $ruta);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('app.administracion.rutas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
           'origen' => ['required'],
            'destino' =>['required'],
    
        ]);
        //dd($request);
        Ruta::create([
            'origen' => $request->origen, //.'-'.$request->destino,
            'destino' => $request->destino,
            'descripcion' => $request->descripcion,
        ]);

        session()->flash('success', 'ruta registrado.');

        return redirect()->route('rutas');
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
    public function edit(Ruta $ruta)
    {
        return view('app.administracion.rutas.edit', [
            'ruta' => $ruta
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruta $ruta)
    {
        $request->validate([
            'origen' => ['required'],
            'destino' => ['required'],
        ]);

        $ruta->update([
            'origen' => $request->origen,
            'destino' => $request->destino,
            'descripcion' => $request->descripcion
        ]);

        session()->flash('success', 'ruta actualizado.');

        return redirect()->route('rutas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ruta = Ruta::find($request->id);
        $old = $ruta;

        if ( $ruta->delete() ) {
            session()->flash('success', 'ruta eliminado');
        } else {
            session()->flash('error', 'Lo siento no se pudo eliminar la ruta');
        }

        return redirect()->route('rutas');
    }
}
