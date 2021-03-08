<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'color' => 'required',
            'edad' => 'numeric | min:1',
            'kind' => 'required',
            'habitat' => 'required',
            'imagen' => 'required | image'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=> 'Es obligatorio escribir un nombre',
            'color.required'=> 'Debe escribir un color para el animal',
            'edad.required'=> 'Debe escribir la edad del animal',
            'edad.min' => 'La edad mínima un año',
            'kind.required'=> 'El animal debe tener una especia',
            'habitat.required' => 'Debe asignar un habitat al animal',
            'imagen.required' => 'Todo animal tiene una foto',
            'imagen.image' => 'Debe subir una imagen no otro archivo'
        ];
    }
}
