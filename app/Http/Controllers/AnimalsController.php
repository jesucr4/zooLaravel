<?php

namespace App\Http\Controllers;

use App\Http\Requests\validacion;
use App\Http\Requests\ValidationFormRequest;
use App\Models\Animal;
use App\Models\Habitat;
use App\Models\Kind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $animals = Animal::all();
        $kinds = Kind::all();
        $habitats = Habitat::all();
        $url='storage/img/';
        return view('animals.index')->with('animals',$animals)
                                        ->with('kinds',$kinds)
                                        ->with('habitats',$habitats)
                                        ->with('url',$url);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kinds = Kind::all();
        $habitats = Habitat::all();
        return view('animals.create')
            ->with('kinds',$kinds)
            ->with('habitats',$habitats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate('rules','messages');

        $messages = [
            'nombre.required'=> 'Es obligatorio escribir un nombre',
            'color.required'=> 'Debe escribir un color para el animal',
            'edad.numeric'=> 'Debe indicar una edad',
            'edad.min' => 'La edad mínima un año',

            'imagen.required' => 'Todo animal tiene una foto',
            'imagen.image' => 'Debe subir una imagen no otro archivo',
        ];
        $request->validate([

            'nombre' => 'required',
            'color' => 'required',
            'edad' => 'numeric | min:1',
            'imagen' => 'required | image',
        ],$messages);

        $animal = new Animal();
        $animal->nombre = $request->nombre;
        $animal->color = $request->color;
        $animal->edad = $request->edad;
        $animal->kind_id = implode($request->kind);
        $animal->habitad_id = implode($request->habitat);

        $imagenAnimal = time().'_'.$request->file('imagen')->getClientOriginalName();
        $animal->imagen = $imagenAnimal;

        $animal->save();
        $request->file('imagen')->storeAs('public/img',$imagenAnimal);
        return redirect()->route('animal.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        $kind = Kind::findOrFail($animal->kind_id);
        $habitat = Habitat::findOrFail($animal->habitad_id);
        $url='storage/img/';
        return view('animals.show')->with('animal',$animal)
                                        ->with('url',$url)
                                        ->with('kind',$kind)
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
        $kinds = Kind::all();
        $habitats = Habitat::all();
        $animal = Animal::findOrFail($id);
        $url='storage/img/';
        return view('animals.edit')->with('animal',$animal)
            ->with('kinds',$kinds)
            ->with('habitats',$habitats)
            ->with('url',$url);
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
            'nombre.required'=> 'Es obligatorio escribir un nombre',
            'color.required'=> 'Debe escribir un color para el animal',
            'edad.numeric'=> 'Debe indicar una edad',
            'edad.min' => 'La edad mínima un año',
        ];
        $request->validate([

            'nombre' => 'required',
            'color' => 'required',
            'edad' => 'numeric | min:1',
        ],$messages);

        $animal = Animal::findOrFail($id);
        $animal->nombre = $request->nombre;
        $animal->color = $request->color;
        $animal->edad = $request->edad;
        $animal->kind_id = implode($request->kind);
        $animal->habitad_id = implode($request->habitat);

        if(is_uploaded_file($request->imagen)){
            $imagenAnimal = time().'_'.$request->file('imagen')->getClientOriginalName();
            $animal->imagen = $imagenAnimal;
            $request->file('imagen')->storeAs('public/img',$imagenAnimal);
        }
        $animal->save();

            return redirect()->route('animal.index');


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
        return redirect()->route('animal.index');
    }


}
