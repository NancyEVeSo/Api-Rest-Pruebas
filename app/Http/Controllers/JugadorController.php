<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Jugador;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judador=Jugador::all();
        return response()->json(['Jugador'=>$judador,'code'=>200]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

