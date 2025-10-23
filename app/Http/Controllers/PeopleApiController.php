<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePeopleRequest;
use App\Services\PeopleService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PeopleApiController extends Controller
{

    protected $peopleService;

    public function __construct(PeopleService $peopleService)
    {
        $this->peopleService = $peopleService;
    }

    /**
     * Método del controlador para obtener todos los usuarios mediante el servicio
     */
    public function index(Request $request)
    {
        try {

            return response()->json([
                'data'      =>  $this->peopleService->getAllPeople($request),
                'message'   => 'Usuarios obtenidos exitosamente'
            ],200);

        } catch (\Exception $e) {
            
            return response()->json([
                'message' => 'Error al obtener usuarios',
                'error'   => $e->getMessage() 
            ],500);

        }
    }

    //** Metodo del controlador para obtener un usuario por su id mediante el servicio*/
    public function show($id){
        try{
            return response()->json([

                'data'      => $this->peopleService->getPersonById($id),
                'message'   => 'Usuario obtenido exitosamente'
            ],200);

        } catch (\Exception $e){

            return response()->json([
                'message'   => 'Error al obtener el usuario',
                'error'     => $e->getMessage()
            ],500);

        }
    }

    /**
     * Método del controlador que guarda una nueva persona mediante el servicio.
     * Los datos son validados automáticamente por StorePeopleRequest.
     */
    public function store(StorePeopleRequest $request)
    {
        try {

            return response()->json([
                'data' => $this->peopleService->createPerson($request->validated()),
                'message'   => 'Usuario creado exitosamente'

            ],200);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al crear el usuario',
                'error'     => $e->getMessage()
            ],500);

        }
    }

    /**
     * Método del controlador que actualiza el registro de una persona mediante el servicio.
     */
    public function update(StorePeopleRequest $request, $id)
    {
        try {

            return response()->json([
                'data'      => $this->peopleService->updatePerson($id, $request->validated()),
                'message'   => 'Usuario actualizado exitosamente'
            ],200);

        } catch (ModelNotFoundException $mnf){

            return response()->json([
                'message' => 'Usuario no encontrado'
            ],404);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al actualizar el usuario',
                'error'     => $e->getMessage()
            ],500);

        }
    }

    /**
     * Metodo del controlador que elimina una persona mediante el servicio
     */
    public function destroy($id)
    {
        try {

            $this->peopleService->deletePerson($id);
            return response()->json([
                'message'   => 'Usuario eliminado exitosamente'
            ],200);

        } catch (ModelNotFoundException $mnf){

            return response()->json([
                'message' => 'Usuario no encontrado'
            ],404);

        } catch (\Exception $e) {

            return response()->json([
                'message'   => 'Error al eliminar el usuario',
                'error'     => $e->getMessage()
            ],500);
        }
    }
}
