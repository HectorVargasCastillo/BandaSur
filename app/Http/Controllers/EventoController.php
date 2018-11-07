<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Pais;
use App\Ciudad;
use App\Banda;
use App\Productora;
use App\EstadoEvento;

class EventoController extends Controller
{
    
    public function index()
    {
        $listado_evento = Evento::all();
        $registros = count($listado_evento);
        if ($registros == 0)
        {
            return view("/evento/listaeventovacio");  
        }
        else
        {
          return view("/evento/listaevento",['listado_evento'=>$listado_evento]);  
        }
    }

   
    public function create()
    {
        $pais_collection = Pais::pluck('nombre','id');
        $pais = $pais_collection->all();
        $pais = array('0' => 'Selecione Pais') + $pais;
		
		$ciudad_collection = Ciudad::pluck('nombre','id');
        $ciudad = $ciudad_collection->all();
        $ciudad = array('0' => 'Selecione Ciudad') + $ciudad;
		
		$banda_collection = Banda::pluck('nombre','id');
        $banda = $banda_collection->all();
        $banda = array('0' => 'Selecione Banda') + $banda;
		
		$productora_collection = Productora::pluck('nombre','id');
        $productora = $productora_collection->all();
        $productora = array('0' => 'Selecione Productora') + $productora;

        $estado_evento_collection = Productora::pluck('nombre','id');
        $estado_evento = $estado_evento_collection->all();
        $estado_evento = array('0' => 'Selecione Estado') + $estado_evento;
		
        return view('/evento/nuevoevento',['pais'=>$pais,'ciudad'=>$ciudad,'banda'=>$banda,'productora'=>$productora,'estado_evento'=>$estado_evento]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:30|unique:evento,nombre',
            'pais' => 'numeric|min:1', 
			'ciudad' => 'numeric|min:1', 
			'recinto' => 'required|max:30|unique:evento,recinto',
			'fecha' => 'required', 
			'hora' => 'required',
			'banda' => 'numeric|min:1',
			'productora' => 'numeric|min:1',
			'estado' => 'required|max:1', 
        ]);
        $eventob = new evento;
        $eventob->nombre=$request->nombre;
		$eventob->pais_id=$request->pais;
		$eventob->ciudad_id=$request->ciudad;
		$eventob->recinto=$request->recinto;
		$eventob->fecha=$request->fecha;
		$eventob->hora=$request->hora;
		$eventob->banda_id=$request->banda;
		$eventob->productora_id=$request->productora;
        $eventob->estado_evento_id=$request->estado;
        $eventob->save();
        //return redirect()->back();
        return redirect('/eventos');
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
		$banda_collection = Banda::pluck('nombre','id');
        $banda = $banda_collection->all();
        $banda = array('0' => 'Selecione Banda') + $banda;
		$productora_collection = Productora::pluck('nombre','id');
        $productora = $productora_collection->all();
        $productora = array('0' => 'Selecione Productora') + $productora;
         $estado_evento_collection = Productora::pluck('nombre','id');
        $estado_evento = $estado_evento_collection->all();
        $estado_evento = array('0' => 'Selecione Estado') + $estado_evento;
		
        $idevento = Evento::find($id);
        return view('/evento/editaevento',['idevento'=>$idevento,'pais'=>$pais,'ciudad'=>$ciudad,'banda'=>$banda,'productora'=>$productora,'estado_evento'=>$estado_evento]);
    }

   
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nombre' => 'required|max:30',
            'pais' => 'numeric|min:1', 
			'ciudad' => 'numeric|min:1', 
			'recinto' => 'required|max:30',
			'fecha' => 'required', 
			'hora' => 'required',
			'banda' => 'numeric|min:1',
			'productora' => 'numeric|min:1',
			'estado' => 'required|max:1', 
        ]);
        $eventob = Evento::find($id);
        $eventob->nombre=$request->nombre;
		$eventob->pais_id=$request->pais;
		$eventob->ciudad_id=$request->ciudad;
		$eventob->recinto=$request->recinto;
		$eventob->fecha=$request->fecha;
		$eventob->hora=$request->hora;
		$eventob->banda_id=$request->banda;
		$eventob->productora_id=$request->productora;
        $eventob->estado_evento_id=$request->estado;
        $eventob->save();
        return redirect('/eventos');
    }

    public function destroy($id)
    {
        $eventob = Evento::find($id);
        $eventob->delete();
        return redirect('/eventos');
    }
}
