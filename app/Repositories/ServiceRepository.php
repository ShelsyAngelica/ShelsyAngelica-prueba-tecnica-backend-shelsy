<?php

namespace App\Repositories;
use App\Models\Service;

class ServiceRepository
{
    //** Metodo para obtener todos los servicios registrados*/
    public function all()
    {
        return Service::all();
    }

    //** Metodo para obtener un servicio por su id*/
    public function find($id)
    {
        return Service::find($id);
    }

    //** Metodo para crear un servicio */
    public function store(array $data)
    {
       return Service::create($data);
    }

    //** Metodo para actualizar un servicio */
    public function update($id, array $data)
    {
        $service = Service::findOrFail($id);
        $service->update($data);
        return $service;
    }

    //** Metodo para eliminar un servicio */
    public function delete($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return $service;
    }
}