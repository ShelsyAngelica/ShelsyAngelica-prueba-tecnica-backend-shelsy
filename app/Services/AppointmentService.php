<?php

namespace App\Services;
use App\Repositories\AppointmentRepository;


class AppointmentService
{
    protected $repository;

    public function __construct(AppointmentRepository $repository)
    {
        $this->repository = $repository;
    }

    //** Metodo para obtener todos las citas desde el repositorio*/
    public function getAllAppointment()
    {
        return $this->repository->all();
    }

    //** Metodo para crear una cita desde el repositorio*/
    public function createAppointment(array $data)
    {
        
        $appointment = $this->repository->store($data);
        $appointment->services()->sync($data['services']);
        $appointment->total = $appointment->services->sum('price'); 
        $appointment->save();

        return $appointment;
    }

    //** Metodo para actualizar una cita desde el repositorio*/
    public function updateAppointment($id, array $data)
    {
        $appointment = $this->repository->update($id, $data);
        $appointment->services()->sync($data['services']);
        $appointment->total = $appointment->services->sum('price');
        $appointment->save();
        return $appointment;
    }

    //** Metodo para eliminar una cita desde el repositorio*/
    public function deleteAppointment($id)
    {
        $appointment = $this->repository->find($id); 
        $appointment->services()->detach(); 
        $this->repository->delete($id);

        return $appointment;
    }
}