<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|string|email|unique:socios|max:255',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'activo' => 'required|boolean',
        ];
        

    }
    
    public function messages(){
        return[
            'nombre.required'=>'Un nombre es obligatorio',
            'apellido.required'=>'Un apellido es obligatorio',
            'fecha_nacimiento.required'=>'Una fecha de nacimiento es obligatorio',
            'email.required'=>'Un email es obligatorio',
            'telefono.required'=>'Un telefono es obligatorio',
            'direccion.required'=>'Una direccion es obligatoria',
            'activo.required'=>'Este campo es obligatorio'

        ];
    }
}
