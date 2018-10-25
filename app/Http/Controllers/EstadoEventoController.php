<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoEvento;

class EstadoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listado_estado_evento = EstadoEvento::all();
        return view("/estado_evento/listaestado_evento",['listado_estado_evento'=>$listado_estado_evento]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/estado_evento/nuevoestado_evento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request, [
            'descripcion' => 'required|max:30|unique:estado_evento,descripcion', 
            
        ]);
        $estado_eventob = new EstadoEvento;
        $estado_eventob->descripcion=$request->descripcion;
        $estado_eventob->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $idestado_evento = EstadoEvento::find($id);
        return view("/estado_evento/editaestado_evento",['idestado_evento'=>$idestado_evento]);
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
        //
        $this->validate($request, [
            'descripcion' => 'required|max:30', 
            
            
        ]);
        $estado_eventob = EstadoEvento::find($id);
        $estado_eventob->descripcion=$request->descripcion;
        $estado_eventob->save();
        return redirect('/estado_eventos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $estado_eventob = EstadoEvento::find($id);
        $estado_eventob->delete();
        return redirect('/estado_eventos');
    }
}
