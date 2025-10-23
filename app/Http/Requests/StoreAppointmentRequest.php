<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
        return [
            'person_id'         => ['required', 'exists:people,id'],
            'barber_id'         => ['required', 'exists:people,id'],
            'appointment_date'  => ['required', 'date', 'after:now'],
            'services'          => ['required', 'array', 'min:1'],
            'services.*'        => ['required', 'exists:services,id'],
        ];
    }

    public function messages()
    {
        return[
            'person_id.required'        => 'El cliente es obligatorio.',
            'person_id.exists'          => 'El cliente seleccionado no existe.',
            'barber_id.required'        => 'El barbero es obligatorio.',
            'barber_id.exists'          => 'El barbero seleccionado no existe.',
            'appointment_date.required' => 'La fecha de la cita es obligatoria.',
            'appointment_date.after'    => 'La fecha debe ser posterior a hoy.',
            'services.required'         => 'Debes seleccionar al menos un servicio.',
            'services.*.exists'         => 'El servicio seleccionado no existe.'
        ];
    }
}
