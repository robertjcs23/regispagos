<?php

namespace App\Http\Requests\Tpago;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
        'descrip'=>'string|required|max:40|unique:cargos'
        ];
    }
    public function message()
    {
        return[
            
            'descrip.required'=>'Este campo es requerido',
            'descrip.string'=>'El valor no es correcto',
            'descrip.unique'=>'Este Cargo ya se encuentra registrado',
            'descrip.min'=>'Se requiere de 8 caracteres mínimo',
            'descrip.max'=>'Solo se permite 40 caracteres máximo',

        ];
    }
}
