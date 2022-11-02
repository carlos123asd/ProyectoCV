<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "grado"=>"required|min:3",
            "nombre"=>"required",
            "fecha_inicial"=>"required",
        ];
    }

    public function messages() //traduccion de los errors
    { 
        return [
            "grado.min"=>"Minimo 3 caracteres para el campo grado",
            "nombre.required"=>"El :attribute es obligatorio"
        ];
    }

    public function attributes()
    {
        return [
            "nombre"=>"Titulo"
        ];
    }
}
