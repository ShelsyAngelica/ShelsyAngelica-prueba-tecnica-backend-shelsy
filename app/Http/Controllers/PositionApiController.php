<?php

namespace App\Http\Controllers;

use App\Services\PositionService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PositionApiController extends Controller
{
    protected $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $positions = $this->positionService->getAll();
            
            return response()->json([
                'data' => $positions,
                'message' => 'Posiciones obtenidas exitosamente'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener posiciones',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    
}
