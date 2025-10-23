<?php

namespace App\Services;
use App\Repositories\ServiceRepository;


class ServiceService
{
    protected $repository;

    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    //** Metodo para obtener todos los servicios desde el repositorio*/
    public function getAllService()
    {
        return $this->repository->all();
    }

    //** Metodo para obtener un servicio por su id desde el repositorio*/
    public function getServiceById($id)
    {
        return $this->repository->find($id);
    }

    //** Metodo para crear un servicio desde el repositorio*/
    public function createService(array $data)
    {
        return $this->repository->store($data);
    }

    //** Metodo para actualizar un servicio desde el repositorio*/
    public function updateService($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    //** Metodo para eliminar un servicio desde el repositorio*/
    public function deleteService($id)
    {
        return $this->repository->delete($id);
    }
}