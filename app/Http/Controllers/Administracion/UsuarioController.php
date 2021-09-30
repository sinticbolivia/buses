<?php

namespace App\Http\Controllers\Administracion;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $request->user()->authorizeRoles(['user','admin']); //para permisos

        return view('app.administracion.usuarios.index', [
            'search' => $request->search ?? '',
            'usuarios' => User::orderBy('created_at', 'desc')
                ->where('email', '<>', 'admin@admin.com')
                ->search(array('nombres', 'apellidos', 'ci', 'email'), $request->search ? $request->search : '')
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('app.administracion.usuarios.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$role_user = Rol::where('nombre', 'usuario')->first(); //permisos
        
        $request->validate([
            'nombres' => ['required', 'min:3', 'max:50'],
            'apellidos' => ['required', 'min:3', 'max:50'],
            'ci' => ['required', 'min:7', 'max:15', Rule::unique('users')],
            'email' => ['required', 'min:10', 'max:150', Rule::unique('users')],
        ]);
        User::create([
            'ci' => $request->ci,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->ci),
            'rol' => $request->rol,
            'estado' => $request->estado
        ]);
        $user = User::where('ci',$request->ci);
        //$user->roles()->attach($role_user);
        
        session()->flash('success', 'Usuario registrado.');

        return redirect()->route('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('app.administracion.usuarios.show', [
            'usuario' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('app.administracion.usuarios.edit', [
            'usuario' => $user
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombres' => ['required', 'min:3', 'max:50'],
            'apellidos' => ['required', 'min:3', 'max:50'],
            'ci' => ['required', 'min:7', 'max:15', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'min:10', 'max:150', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update([
            'ci' => $request->ci,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'rol' => $request->rol,
            'estado' => $request->estado
        ]);

        session()->flash('success', 'Usuario actualizado.');

        return redirect()->route('usuarios');
    }

    public function destroy (Request $request)
    {
        $user = User::find($request->id);
        $old = $user;

        if ( $user->delete() ) {
            session()->flash('success', 'usuario eliminado');
        } else {
            session()->flash('error', 'Lo siento no se pudo eliminar el Usuario');
        }

        return redirect()->route('usuarios');
    }
}
