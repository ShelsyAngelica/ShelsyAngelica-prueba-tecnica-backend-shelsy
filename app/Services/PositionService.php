<?php

namespace App\Services;

use App\Models\Position;
use App\Repositories\PositionRepository;

class PositionService
{
    protected $repository;

    public function __construct(PositionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtener todas las posiciones
     */
    public function getAll()
    {
        return $this->repository->getAll();
    }

}
