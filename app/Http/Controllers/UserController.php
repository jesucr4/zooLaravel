<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users',$users);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::findOrFail(Auth::user()->id);
        return redirect('usuario/'.$user->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);

        return view( 'user.show')->with('user',$usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view( 'user.edit')->with('user',$usuario);
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
        $messages = [
            'nombre.required'=> 'Es obligatorio que escriba su nombre',
            'nombre.string'=> 'Su nombre debe ser escrito en letras',
            'nombre.max'=> 'Su nombre no puede tener más de 255 carácteres',
            'apellidos.required'=> 'Es obligatorio que escriba sus apellidos',
            'direccion.required'=> 'Es obligatorio que escriba su direccion',
            'direccion.max'=> 'Su direccion no puede tener más de 255 carácteres',
            'telefono.required'=> 'Debe incluir su teléfono',
            'password.required'=> 'Escriba una contraseña por favor',
            'password.string' => 'La contraseña debe incluir texto',
            'password.min' => 'El mínimo de su contraseña debe ser 5 carácteres',
        ];
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos'=> 'required',
            'password' => 'required|string|min:5',
            'direccion' => 'required | max:200',
            'telefono' => 'required',
        ],$messages);

        $user = User::findOrFail($id);
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id);
       $user->delete();
       return redirect()->route('usuario.index');
    }
}
