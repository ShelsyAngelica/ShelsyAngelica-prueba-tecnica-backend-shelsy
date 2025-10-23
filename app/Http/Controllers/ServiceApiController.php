<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Services\ServiceService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceApiController extends Controller
{

    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            return response()->json([
                'data'      =>  $this->serviceService->getAllService(),
                'message'   => 'Servicios obtenidos exitosamente'
            ],200);

        } catch (\Exception $e) {
            
            return response()->json([
                'message' => 'Error al obtener servicios',
                'error'   => $e->getMessage() 
            ],500);

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        try {

            return response()->json([
                'data' => $this->serviceService->createService($request->validated()),
                'message'   => 'Servicio creado exitosamente'

            ],200);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al crear el servicio',
                'error'     => $e->getMessage()
            ],500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return response()->json([

                'data'      => $this->serviceService->getServiceById($id),
                'message'   => 'Servicio obtenido exitosamente'
            ],200);

        } catch (\Exception $e){

            return response()->json([
                'message'   => 'Error al obtener el Servicio',
                'error'     => $e->getMessage()
            ],500);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreServiceRequest $request, string $id)
    {
        try {

            return response()->json([
                'data'      => $this->serviceService->updateService($id, $request->validated()),
                'message'   => 'Servicio actualizado exitosamente'
            ],200);

        } catch (ModelNotFoundException $mnf){

            return response()->json([
                'message' => 'Servicio no encontrado'
            ],404);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al actualizar el servicio',
                'error'     => $e->getMessage()
            ],500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $this->serviceService->deleteService($id);
            return response()->json([
                'message'   => 'Servicio eliminado exitosamente'
            ],200);

        } catch (ModelNotFoundException $mnf){

            return response()->json([
                'message' => 'Servicio no encontrado'
            ],404);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al eliminar el servicio',
                'error'     => $e->getMessage()
            ],500);
        }
    }
}
