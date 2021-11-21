<?php

namespace App\Http\Requests;

use App\Rules\SelectedValid;
use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
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
            'email.unique' => 'El correo debe ser unico en el sistema, este ya existe',

            'password.required' => 'La contraseña es requerido',
            'password.min' => 'La contraseña debe teber minimo 8 caracteres',
            'password.string' => 'Debe escribir una cadena de texto',
        ];
    }
}
