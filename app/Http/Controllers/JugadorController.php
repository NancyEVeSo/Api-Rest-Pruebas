<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Jugador;

class JugadorController extends Controller
{
    /**
 * @SWG\Get(
 *   path="/jugador",
 *   tags={"Lista de Jugador"},
 *   summary="Lista de Jugador",
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
        $judador=Jugador::all();
        return response()->json(['Jugador'=>$judador,'code'=>200]);
    }

   /**
     * @SWG\Post(
     *   path="/jugador",
 *       tags={"Lista de Jugador"},
 *       summary="Lista de Jugador",
     *   operationId="getCustomerRates 1",
     *   @SWG\Parameter(
     *     name="idequipo",
     *     in="formData",
     *     description="ingresar id  equipo",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="nombre",
     *     in="formData",
     *     description="ingresar nombre",
     *     required=true,
     *     type="string"
     *   ),
     *  @SWG\Parameter(
     *     name="apellido",
     *     in="formData",
     *     description="ingresar apellido",
     *     required=true,
     *     type="string"
     *   ),
     *   *  @SWG\Parameter(
     *     name="edad",
     *     in="formData",
     *     description="ingresar edad",
     *     required=true,
     *     type="string"
     *   ),
     *   *  @SWG\Parameter(
     *     name="pais",
     *     in="formData",
     *     description="ingresar pais",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=404, description="not found"),)
     * )
     *
     */
    
    
    public function store(Request $request)
    {
        if(empty($request->nombre) || empty($request->apellido)|| empty($request->edad)||empty($request->pais)) {

            return response()->json(['message'=>'Todos los campos son requeridos', 'code'=>'406']);
        }

        $judador = new Jugador();
        $judador->idequipo=$request->idequipo;
        $judador->nombre=$request->nombre;
        $judador->apellido=$request->apellido;
        $judador->edad=$request->edad;
        $judador->pais=$request->pais;
        
        $judador->save();
        return response()->json(['message'=>'judador creado correctamente', 'code'=>'201']);
    }
/**
     * @SWG\Get(
     *   path="/jugador/{id}",
     *   tags={"Lista de Jugador"},
     *   summary="Obtener Jugador",
     *   operationId="getRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id del jugador",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description="datos obtenidos correctamente"),
     *   @SWG\Response(response=404, description="el id de jugador no existe"),
     *   @SWG\Response(response=422, description="no se permiten valores nulos"),
     * )
     *
     */
    public function show($id)
    {
         $judador= Jugador::find($id);
        if((empty($judador))){
            return response()->json(['mensaje'=>'Jugador no encontrado','code'=>'404']);
        }
        return response()->json(['Jugador'=> $judador,'code'=>'200']);
    }

   /**
     * @SWG\Put(
     *   path="/jugador/{id}",
     *   tags={"Lista de Jugador"},
     *   summary="actualizar jugadores compartidas",
     *   operationId="sharedRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id de jugadores",
     *     required=true,
     *     type="integer"
     *   ),
     *   *   @SWG\Parameter(
     *     name="idequipo",
     *     in="formData",
     *     description="ingresar id  equipo",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="nombre",
     *     in="formData",
     *     description="ingresar nombre",
     *     required=true,
     *     type="string"
     *   ),
     *  @SWG\Parameter(
     *     name="apellido",
     *     in="formData",
     *     description="ingresar apellido",
     *     required=true,
     *     type="string"
     *   ),
     *   *  @SWG\Parameter(
     *     name="edad",
     *     in="formData",
     *     description="ingresar edad",
     *     required=true,
     *     type="string"
     *   ),
     *   *  @SWG\Parameter(
     *     name="pais",
     *     in="formData",
     *     description="ingresar pais",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=200, description="datos obtenidos correctamente"),
     *   @SWG\Response(response=404, description="jugador no encontrado"),
     *   @SWG\Response(response=422, description="no se permiten valores nulos"),
     * )
     *
     */
    public function update(Request $request, $id)
    {
         if(empty($request->idequipo) || empty($request->nombre) || empty($request->apellido)|| empty($request->edad)||empty($request->pais)) {

            return response()->json(['message'=>'Los campos son requeridos', 'code'=>'406']);
        }


        $judador=Jugador::find($id);
        if(empty($request->nombre) || empty($request->apellido)|| empty($request->edad)||empty($request->pais)){

                return response()->json(['message'=>'Jugador no encontrado', 'code'=>'404']);
        }
        
        $judador->idequipo=$request->idequipo;
        $judador->nombre=$request->nombre;
        $judador->apellido=$request->apellido;
        $judador->edad=$request->edad;
        $judador->pais=$request->pais;
        
        $judador->save();
        return response()->json(['message'=>'Jugador actualizado', 'code'=>'200']);    
    }

    /**
     * @SWG\Delete(
     *   path="/jugador/{id}",
     *   tags={"Lista de Jugador"},
     *   summary="eliminar Jugador",
     *   operationId="deleteJugador",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar el id de jugador",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=204, description="jugador eliminada correctamente"),
     *   @SWG\Response(response=404, description="jugador no encontrada"),
     * )
     *
     */
    public function destroy($id)
    {
          if(empty($id)) {

            return response()->json(['message'=>'el id es obligatorio', 'code'=>'406']);
        }


        $judador=Jugador::find($id);
        if(empty($judador)){

                return response()->json(['message'=>'Jugador no encontrado', 'code'=>'404']);
        }
        
        $judador->delete();

        return response()->json(['message'=>'Jugador borrado', 'code'=>'200']);

    }
    }

