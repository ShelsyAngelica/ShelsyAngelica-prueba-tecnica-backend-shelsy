<?php

namespace App\Repositories;
use App\Models\Appointment;

class AppointmentRepository
{
    //** Metodo para obtener todos las citas registradas*/
    public function all()
    {
        return Appointment::with(['client', 'barber', 'services'])->get();
    }

    //** Metodo para obtener una cita por su id*/
    public function find($id)
    {
        return Appointment::with('services')->find($id);
    }
    //** Metodo para crear una cita */
    public function store(array $data)
    {
       return Appointment::create($data);
    }

        //** Metodo para actualizar una cita */
    public function update($id, array $data)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($data);
        return $appointment;
    }

    //** Metodo para eliminar una cita */
    public function delete($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return $appointment;
    }
}