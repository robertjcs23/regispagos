<?php

namespace App\Http\Requests\Empleado;

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
        'cedula'=>'string|required|max:8|unique:empleados,'.$this->route('empleados')->id.'',
        'nombre'=>'string|required|max:40,'.$this->route('empleados')->id.'',
        'apellido'=>'string|required|max:40,'.$this->route('empleados')->id.'',
        'telefono'=>'string|required|max:11|unique:empleados,'.$this->route('empleados')->id.'',
        'correo'=>'string|unique:empleados|max:100|email:rfc,dns,'.$this->route('empleados')->id.''
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
            'correo.unique'=>'Este correo ya se encuentra registrado'
        ];
    }
}
