<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class zooController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(Animal::all());
    }
    public function create()
    {
        return redirect()->route('apizoo.store');
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return redirect('api/apizoo/'.$animal->id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = new Animal();
        $animal->nombre = $request->nombre;
        $animal->color = $request->color;
        $animal->edad = $request->edad;
        $animal->kind_id = $request->kind;
        $animal->habitad_id = $request->habitat;
        $imagenAnimal = time().'_'.$request->file('imagen')->getClientOriginalName();
        $animal->imagen = $imagenAnimal;

        $animal->save();
        $request->file('imagen')->storeAs('public/img',$imagenAnimal);
        return response()->json(['error'=>'true','mensaje'=>'Animal añadido correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Animal::find($id));
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
        $animal = Animal::findOrFail($id);
        $animal->nombre = $request->nombre;
        $animal->color = $request->color;
        $animal->edad = $request->edad;
        $animal->kind_id = $request->kind;
        $animal->habitad_id = $request->habitat;

        if(is_uploaded_file($request->imagen)){
            $imagenAnimal = time().'_'.$request->file('imagen')->getClientOriginalName();
            $animal->imagen = $imagenAnimal;
            $request->file('imagen')->storeAs('public/img',$imagenAnimal);
        }
        $animal->save();
        return response()->json(['error'=>'true','mensaje'=>'Animal editado correctamente']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return response()->json(Animal::all());
    }
}
