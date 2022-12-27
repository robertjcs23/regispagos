<?php

namespace App\Http\Requests\Cliente;

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
        'cedula'=>'string|required|max:8|unique:clientes',
        'nombre'=>'string|required|max:40',
        'apellido'=>'string|required|max:40',
        'telefono'=>'string|required|max:11|unique:clientes',
        'correo'=>'string|unique:clientes|max:100|email:rfc,dns',
        'direccion'=>'string|required|max:250'
        ];
    }
    public function message()
    {
        return[
            'nombre.required'=>'Este campo es requerido',
            'nombre.string'=>'El valor no es correcto',
            'nombre.max'=>'Solo se permite 40 caracteres',
            
            'cedula.required'=>'Este campo es requerido',
            'cedula.string'=>'El valor no es correcto',
            'cedula.unique'=>'Este Cedula ya se encuentra registrada',
            'cedula.min'=>'Se requiere de 8 caracteres',
            'cedula.max'=>'Solo se permite 8 caracteres',

            'apellido.required'=>'Este campo es requerido',
            'apellido.string'=>'El valor no es correcto',
            'apellido.max'=>'Solo se permite 40 caracteres',

            'telefono.required'=>'Este campo es requerido',
            'telefono.string'=>'El valor no es correcto',
            'telefono.max'=>'Solo se permite 11 caracteres',
            'telefono.min'=>'Se requiere de 11 caracteres',
            'telefono.unique'=>'Este Nro de teléfono ya se encuentra registrado',

            'correo.email'=>'No es un correo electrónico',
            'correo.string'=>'El valor no es correcto',
            'correo.max'=>'Solo se permite 100 caracteres',
            'correo.unique'=>'Este correo ya se encuentra registrado',

            'direccion.required'=>'Este campo es requerido',
            'direccion.string'=>'El valor no es correcto',
            'direccion.max'=>'Solo se permite 40 caracteres',
        ];
    }
}
