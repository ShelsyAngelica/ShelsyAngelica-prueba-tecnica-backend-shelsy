<?php

namespace App\Repositories;
use App\Models\People;

class PeopleRepository
{
    //** Metodo para obtener todos los usuarios registrados*/
    public function all($request)
    {
        return People::with('position')
        ->when($request->has('position_id'), function($query) use ($request)
        {
            $query->where('position_id', $request->position_id);
        })
        ->get();
    }

    //** Metodo para obtener un usuario por su id*/
    public function find($id)
    {
        return People::find($id);
    }

    //** Metodo para crear un usuario */
    public function store(array $data)
    {
       return People::create($data);
    }

    //** Metodo para actualizar un usuario */
    public function update($id, array $data)
    {
        $person = People::findOrFail($id);
        $person->update($data);
        return $person;
    }

    //** Metodo para eliminar un usuario */
    public function delete($id)
    {
        $person = People::findOrFail($id);
        $person->delete();
        return $person;
    }
}