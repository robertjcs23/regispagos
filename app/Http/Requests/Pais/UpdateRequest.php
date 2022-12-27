<?php

namespace App\Http\Requests\Pais;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

   public function rules()
    {
        return [

            'descrip'=>'string|required|unique:pais|max:40',

        ];
    }
    public function message()
    {
        return[

            'descrip.required'=>'Este campo es requerido',
            'descrip.string'=>'El valor no es correcto',
            'descrip.unique'=>'El pais ya esta registrado',
            'descrip.max'=>'Solo se permite 40 caracteres',            
        ];  
    }
}
