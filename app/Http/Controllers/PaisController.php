<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listado_pais = Pais::all();
        return view("/pais/listapais",['listado_pais'=>$listado_pais]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/pais/nuevopais');
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
            'nombre' => 'required|max:30|unique:pais,nombre', 
            'estado' => 'required|max:1', 
        ]);
        $paisb = new Pais;
        $paisb->nombre=$request->nombre;
        $paisb->estado=$request->estado;
        $paisb->save();
        //return redirect()->back();
        return redirect('/paises');
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
        $idpais = Pais::find($id);
        return view("/pais/editapais",['idpais'=>$idpais]);
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
            'estado' => 'required|max:1', 
            
        ]);
        $paisb = Pais::find($id);
        $paisb->nombre=$request->nombre;
        $paisb->estado=$request->estado;
        $paisb->save();
        return redirect('/paises');
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
        $paisb = Pais::find($id);
        $paisb->delete();
        return redirect('/paises');
    }
}
