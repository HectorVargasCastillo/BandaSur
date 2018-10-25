<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estilo;

class EstiloController extends Controller
{
   
    public function index()
    {
      
		$listado_estilo = Estilo::all();
        $registros = count($listado_estilo);
        if ($registros == 0)
        {
            //return view("/estilo/listaestilovacio",['listado_estilo'=>$listado_estilo]); 
			return view('/estilo/nuevoestilo',['registros'=>$registros]);

        }
        else
        {
          return view("/estilo/listaestilo",['listado_estilo'=>$listado_estilo]);  
        }

        
    }

    
    public function create()
    {
        //
        return view('/estilo/nuevoestilo',['registros'=>"1"]);
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nombre' => 'required|max:30|unique:estilo,nombre', 
            'estado' => 'required|max:1', 
        ]);
        $estilob = new Estilo;
        $estilob->nombre=$request->nombre;
        $estilob->estado=$request->estado;
        $estilob->save();
        return redirect('/estilos');
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
        $idestilo = Estilo::find($id);
        return view("/estilo/editaestilo",['idestilo'=>$idestilo]);
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
        $estilob = Estilo::find($id);
        $estilob->nombre=$request->nombre;
        $estilob->estado=$request->estado;
        $estilob->save();
        return redirect('/estilos');
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
        $estilob = Estilo::find($id);
        $estilob->delete();
        return redirect('/estilos');
    }
}
