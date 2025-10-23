<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $emailRule = 'required|email';

        if(!$this->isMethod('PUT') && !$this->isMethod('PATCH')){
            // Esta validacion nos permite validar que el correo no exista cuando se esta creando
            $emailRule .= '|unique:people,email';

        }
        return [
            'name'              => 'required|string',
            'email'             => $emailRule,
            'document_number'   => 'required|string',
            'phone_number'      => 'nullable|string|max:20',
            'position_id'       => 'required|exists:positions,id',              
            'percentage'        => 'required|integer|min:0|max:100'
        ];
    }

    public function messages()
    {
        return[
            'name.required'  => 'El nombre es obligatorio.',
            'email.required' => 'El correo es obligatorio.',
            'email.email'    => 'Debe ser un correo válido.',
            'email.unique'   => 'Este correo ya está registrado.',
            'position_id.required' => 'La posición es obligatoria.',
            'position_id.exists' => 'La posición seleccionada no existe.',
            'percentage.required' => 'El porcentaje es obligatorio.',
        ];
    }
}
