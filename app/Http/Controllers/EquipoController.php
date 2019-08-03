<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;

class EquipoController extends Controller
{
    /**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Nancy Apis",
 *     version="1.0.0"
 *   )
 * )
 */
/**
 * @SWG\Get(
 *   path="/equipo",
 *   tags={"Lista de Equipo"},
 *   summary="Lista de Equipo",
 *   operationId="getCustomerRates",
 *   
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=406, description="not acceptable"),
 *   @SWG\Response(response=500, description="internal server error")
 * )
 *
 */
    public function index()
    {
        $equipo=Equipo::all();
        return response()->json(['Equipo'=>$equipo,'code'=>200]);
    }

   /**
     * @SWG\Post(
     *   path="/equipo",
     *   tags={"Lista de Equipo"},
     *   summary="Obtener Equipo",
     *   operationId="getCustomerRates 1",
     *   @SWG\Parameter(
     *     name="descripcion",
     *     in="formData",
     *     description="ingresar equipo",
     *     required=true,
     *     type="string"
     *   ),
     *  
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=404, description="not found"),)
     * )
     *
     */
    public function store(Request $request)
    {
        if(empty($request->descripcion) ) {

            return response()->json(['message'=>'El campo es requerido', 'code'=>'406']);
        }

        $equipo = new Equipo();
        $equipo->descripcion=$request->descripcion;
        
        $equipo->save();
        return response()->json(['message'=>'Equipo creado correctamente', 'code'=>'201']);
    }

    /**
     * @SWG\Get(
     *   path="/equipo/{id}",
     *   tags={"Lista de Equipo"},
     *   summary="Obtener Equipo",
     *   operationId="getRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id del equipo",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="datos obtenidos correctamente"),
     *   @SWG\Response(response=404, description="el id de equipo no existe"),
     *   @SWG\Response(response=422, description="no se permiten valores nulos"),
     * )
     *
     */
    public function show($id)
    {
        $equipo= Equipo::find($id);
        if((empty($equipo))){
            return response()->json(['mensaje'=>'Equipo no encontrado','code'=>'404']);
        }
        return response()->json(['Equipo'=> $equipo,'code'=>'200']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @SWG\Put(
     *   path="/equipo/{id}",
     *   tags={"Lista de Equipo"},
     *   summary="actualizar equipos compartidas",
     *   operationId="sharedRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id de equipos",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     name="descripcion",
     *     in="formData",
     *     description="ingresar equipo",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="datos obtenidos correctamente"),
     *   @SWG\Response(response=404, description="usuario no encontrado"),
     *   @SWG\Response(response=422, description="no se permiten valores nulos"),
     * )
     *
     */
    public function update(Request $request, $id)
    {
         if(empty($request->descripcion) ) {

            return response()->json(['message'=>'El campo es requerido', 'code'=>'406']);
        }


        $equipo=Equipo::find($id);
        if(empty($equipo)){

                return response()->json(['message'=>'Equipo no encontrado', 'code'=>'404']);
        }
        
        $equipo->descripcion=$request->descripcion;
        
        $equipo->save();
        return response()->json(['message'=>'Equipo actualizado', 'code'=>'200']);
    }

    /**
     * @SWG\Delete(
     *   path="/equipo/{id}",
     *   tags={"Lista de Equipo"},
     *   summary="eliminar Equipo",
     *   operationId="deleteEquipo",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar el id de equipo",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=204, description="equipo eliminada correctamente"),
     *   @SWG\Response(response=404, description="equipo no encontrada"),
     * )
     *
     */
    public function destroy($id)
    {
         if(empty($id)) {

            return response()->json(['message'=>'el id es obligatorio', 'code'=>'406']);
        }


        $equipo=Equipo::find($id);
        if(empty($equipo)){

                return response()->json(['message'=>'Equipo no encontrado', 'code'=>'404']);
        }
        
        $equipo->delete();

        return response()->json(['message'=>'Equipo borrado', 'code'=>'200']);

    }
    
}
