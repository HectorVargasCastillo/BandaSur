<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banda;
use App\Pais;
use App\Ciudad;
use App\Estilo;

class BandaController extends Controller
{
    
    public function index()
    {
        $listado_banda = Banda::all();
        return view("/banda/listabanda",['listado_banda'=>$listado_banda]);
    }

   
    public function create()
    {
        $pais_collection = Pais::pluck('nombre','id');
        $pais = $pais_collection->all();
        $pais = array('0' => 'Selecione Pais') + $pais;
		
		$ciudad_collection = Ciudad::pluck('nombre','id');
        $ciudad = $ciudad_collection->all();
        $ciudad = array('0' => 'Selecione Ciudad') + $ciudad;
		
		$estilo_collection = Estilo::pluck('nombre','id');
        $estilo = $estilo_collection->all();
        $estilo = array('0' => 'Selecione Estilo') + $estilo;
		
        return view('/banda/nuevobanda',['pais'=>$pais,'ciudad'=>$ciudad,'estilo'=>$estilo]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:30|unique:banda,nombre',
            'pais' => 'numeric|min:1', 
			'ciudad' => 'numeric|min:1', 
			'estilo' => 'numeric|min:1',
            'representante' => 'required|max:30|unique:banda,representante',
			'estado' => 'required|max:1', 
        ]);
        $bandab = new Banda;
        $bandab->nombre=$request->nombre;
		$bandab->pais_id=$request->pais;
		$bandab->ciudad_id=$request->ciudad;
		$bandab->estilo_id=$request->estilo;
        $bandab->imagen=$request->imagen;
        $bandab->representante=$request->representante;
        $bandab->estado=$request->estado;
        $bandab->save();
        //return redirect()->back();
        return redirect('/bandas');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pais_collection = Pais::pluck('nombre','id');
        $pais = $pais_collection->all();
        $pais = array('0' => 'Selecione Pais') + $pais;
		$ciudad_collection = Ciudad::pluck('nombre','id');
        $ciudad = $ciudad_collection->all();
        $ciudad = array('0' => 'Selecione Ciudad') + $ciudad;
		$estilo_collection = Estilo::pluck('nombre','id');
        $estilo = $estilo_collection->all();
        $estilo = array('0' => 'Selecione Estilo') + $estilo;
		
        $idbanda = Banda::find($id);
        return view('/banda/editabanda',['idbanda'=>$idbanda,'pais'=>$pais,'ciudad'=>$ciudad,'estilo'=>$estilo]);
    }

   
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nombre' => 'required|max:30',
            'pais' => 'numeric|min:1', 
			'ciudad' => 'numeric|min:1', 
			'estilo' => 'numeric|min:1', 
            'representante' => 'required|max:30',
            'estado' => 'required|max:1', 
        ]);
        $bandab = Banda::find($id);
        $bandab->nombre=$request->nombre;
        $bandab->pais_id=$request->pais;
		$bandab->ciudad_id=$request->ciudad;
		$bandab->estilo_id=$request->estilo;
        $bandab->representante=$request->representante;
        $bandab->estado=$request->estado;
        $bandab->save();
        return redirect('/bandas');
    }

    public function destroy($id)
    {
        $bandab = Banda::find($id);
        $bandab->delete();
        return redirect('/bandas');
    }
}
