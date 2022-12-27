<?php

namespace App\Http\Requests\Role;

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
        'descrip'=>'string|required|max:30|unique:cargos,'.$this->route('cargos')->id.''
        ];
    }
    public function message()
    {
        return[
            
            'descrip.required'=>'Este campo es requerido',
            'descrip.string'=>'El valor no es correcto',
            'descrip.unique'=>'Este Cargo ya se encuentra registrado',
            'descrip.max'=>'Solo se permite 40 caracteres máximo'

        ];
    }
}