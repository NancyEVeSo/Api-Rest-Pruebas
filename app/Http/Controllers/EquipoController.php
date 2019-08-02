<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipo=Equipo::all();
        return response()->json(['Equipo'=>$equipo,'code'=>200]);
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
        if(empty($request->descripcion) ) {

            return response()->json(['message'=>'El campo es requerido', 'code'=>'406']);
        }

        $equipo = new Equipo();
        $equipo->descripcion=$request->descripcion;
        
        $equipo->save();
        return response()->json(['message'=>'Equipo creado correctamente', 'code'=>'201']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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


        $equipo=Equipo::find($id);
        if(empty($equipo)){

                return response()->json(['message'=>'Equipo no encontrado', 'code'=>'404']);
        }
        
        $equipo->delete();

        return response()->json(['message'=>'Equipo borrado', 'code'=>'200']);

    }
    
}
