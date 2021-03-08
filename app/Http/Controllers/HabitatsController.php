<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Habitat;
use App\Models\Kind;
use Illuminate\Http\Request;

class HabitatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitat = Habitat::all();
        return view('habitats.index')->with('habitat',$habitat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('habitats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'descripcion.required'=> 'Tiene que escribir una descripción del hábitat',
        ];
        $request->validate([
            'descripcion'=>'required | string',
        ],$messages);

        $habitat = new Habitat();
        $habitat->descripcion = $request->descripcion;
        $habitat->save();
        return redirect()->route('habitat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $habitat = Habitat::findOrFail($id);


        $animal = Animal::where('habitad_id','=',$habitat->id)->get();

        $url='storage/img/';

        return view('habitats.show')->with('animal',$animal)
                                        ->with('url',$url)
                                        ->with('habitat',$habitat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitat = Habitat::findOrFail($id);
        return view('habitats.edit')->with('habitat',$habitat);
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
            'descripcion.required'=> 'Tiene que escribir una descripción del hábitat',
        ];
        $request->validate([
            'descripcion'=>'required | string',
        ],$messages);

        $habitat = Habitat::findOrFail($id);
        $habitat->descripcion = $request->descripcion;
        $habitat->save();
        return redirect()->route('habitat.index');
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

    public function animals(){
        return $this->hasMany(Animal::class);
    }
}
