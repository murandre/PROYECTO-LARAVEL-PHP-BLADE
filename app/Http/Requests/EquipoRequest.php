<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoRequest extends FormRequest
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
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'disponible' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
        'nombre.required' => 'Se requiere de un nombre',
        'descripcion.required' => 'Se requiere de una descripcion',
        'cantidad.required' => 'Se requiere de una cantidad',
        'disponible.required' => 'Este campo es obligatorio'
        ];
        
    }
}
