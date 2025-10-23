<?php

namespace App\Repositories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;

class PositionRepository
{
    protected $model;

    public function __construct(Position $model)
    {
        $this->model = $model;
    }

    /**
     * Obtener todas las posiciones
     */
    public function getAll()
    {
        return $this->model->all();
    }

}
