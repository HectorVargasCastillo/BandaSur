<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Pais;

class ciudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listado_ciudad = Ciudad::all();
        return view("/ciudad/listaciudad",['listado_ciudad'=>$listado_ciudad]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pais_collection = Pais::pluck('nombre','id');
        $pais = $pais_collection->all();
        $pais = array('0' => 'Selecione Pais') + $pais;
        return view('/ciudad/nuevociudad',['pais'=>$pais]);
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
            'nombre' => 'required|max:30|unique:ciudad,nombre', 
            'pais' => 'numeric|min:1', 
            'estado' => 'required|max:1', 
        ]);
        $ciudadb = new Ciudad;
        $ciudadb->nombre=$request->nombre;
        $ciudadb->pais_id=$request->pais;
        $ciudadb->estado=$request->estado;
        $ciudadb->save();
        //return redirect()->back();
        return redirect('/ciudades');
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
        $pais_collection = Pais::pluck('nombre','id');
        $pais = $pais_collection->all();
        $pais = array('0' => 'Selecione Pais') + $pais;
        $idciudad = Ciudad::find($id);
        return view('/ciudad/editaciudad',['idciudad'=>$idciudad,'pais'=>$pais]);
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
            'nombre' => 'required|max:30',
            'pais' => 'numeric|min:1',  
            'estado' => 'required|max:1', 
            
        ]);
        $ciudadb = Ciudad::find($id);
        $ciudadb->nombre=$request->nombre;
        $ciudadb->pais_id=$request->pais;
        $ciudadb->estado=$request->estado;
        $ciudadb->save();
        return redirect('/ciudades');
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
        $ciudadb = Ciudad::find($id);
        $ciudadb->delete();
        return redirect('/ciudades');
    }
}
