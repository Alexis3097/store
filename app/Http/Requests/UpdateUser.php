<?php

namespace App\Http\Requests;

use App\Rules\SelectedValid;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:190'],
            'lastname_1' => ['required', 'string', 'max:190'],
            'lastname_2' => ['required', 'string', 'max:190'],
            'email' => ['required', 'string', 'email', 'max:190',],
            'tipo_usuario_id' => [new SelectedValid()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'Maximo 190 caracteres',
            'name.string' => 'Debe escribir una cadena de texto',

            'lastname_1.required' => 'El apellido paterno es requerido',
            'lastname_1.max' => 'Maximo 190 caracteres',
            'lastname_1.string' => 'Debe escribir una cadena de texto',

            'lastname_2.required' => 'El apellido materno es requerido',
            'lastname_2.max' => 'Maximo 190 caracteres',
            'lastname_2.string' => 'Debe escribir una cadena de texto',

            'email.required' => 'El correo es requerido',
            'email.max' => 'Maximo 190 caracteres',
            'email.string' => 'Debe escribir una cadena de texto',
            'email.email' => 'Escriba un correo valido',
        ];
    }
}
