<?php

namespace App\Http\Requests;

use App\Rules\SelectedValid;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProducto extends FormRequest
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
            'nombre' => ['required', 'max:190'],
            'descripcion' => ['required'],
            'foto_ruta' => 'max:2048',
            'categoria_id' => [new SelectedValid()],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.max' => 'El nombre no debe ser mayor a 190 caracteres',
            'descripcion.required' => 'La descripcion es requerido',
        ];
    }
}
