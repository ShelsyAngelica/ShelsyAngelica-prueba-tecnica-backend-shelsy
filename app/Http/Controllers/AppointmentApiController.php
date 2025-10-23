<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Services\AppointmentService;

class AppointmentApiController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }
    /**
     * Lista todas las citas mediante el servicio
     */
    public function index()
    {
        try {

            return response()->json([
                'data'      =>  $this->appointmentService->getAllAppointment(),
                'message'   => 'Citas obtenidas exitosamente'
            ],200);

        } catch (\Exception $e) {
            
            return response()->json([
                'message' => 'Error al obtener citas',
                'error'   => $e->getMessage() 
            ],500);

        }
    }

    /**
     * Crea una nueva cita mediante el servicio
     */
    public function store(StoreAppointmentRequest $request)
    {
        try {

            return response()->json([
                'data' => $this->appointmentService->createAppointment($request->validated()),
                'message'   => 'Cita creada exitosamente'

            ],200);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al crear la cita',
                'error'     => $e->getMessage()
            ],500);

        }
    }

    /**
     * Actualiza una cita mediante el servicio
     */
    public function update(StoreAppointmentRequest $request, string $id)
    {
        try {

            return response()->json([
                'data'      => $this->appointmentService->updateAppointment($id, $request->validated()),
                'message'   => 'Cita actualizada exitosamente'
            ],200);

        } catch (ModelNotFoundException $mnf){

            return response()->json([
                'message' => 'Cita no encontrada'
            ],404);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al actualizar la cita',
                'error'     => $e->getMessage()
            ],500);

        }
    }

    /**
     * Elimina una cita mediante el servicio
     */
    public function destroy(string $id)
    {
        try {

            $this->appointmentService->deleteAppointment($id);
            return response()->json([
                'message'   => 'Cita eliminada exitosamente'
            ],200);

        } catch (ModelNotFoundException $mnf){

            return response()->json([
                'message' => 'Cita no encontrada'
            ],404);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al eliminar la cita',
                'error'     => $e->getMessage()
            ],500);
        }
    }
}
