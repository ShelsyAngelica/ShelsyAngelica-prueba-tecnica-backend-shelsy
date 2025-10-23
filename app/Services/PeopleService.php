<?php

namespace App\Services;
use App\Repositories\PeopleRepository;


class PeopleService
{
    protected $repository;

    public function __construct(PeopleRepository $repository)
    {
        $this->repository = $repository;
    }

    //** Metodo para obtener todos los usuario desde el repositorio*/
    public function getAllPeople($request)
    {
        return $this->repository->all($request);
    }

    //** Metodo para obtener un usuario por su id desde el repositorio*/
    public function getPersonById($id)
    {
        return $this->repository->find($id);
    }

    //** Metodo para crear un usuario desde el repositorio*/
    public function createPerson(array $data)
    {   
        $person = $this->repository->store($data);
        return $person;
    }

    //** Metodo para actualizar un usuario desde el repositorio*/
    public function updatePerson($id, array $data)
    {
        $person = $this->repository->update($id, $data);
        return $person;
    }

    //** Metodo para eliminar un usuario desde el repositorio*/
    public function deletePerson($id)
    {
        return $this->repository->delete($id);
    }
}