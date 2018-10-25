<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Integrante;
use App\Instrumento;
use App\Banda;

class IntegranteController extends Controller
{
    public function index()
    {
        $listado_integrante = Integrante::all();
        return view("/integrante/listaintegrante",['listado_integrante'=>$listado_integrante]);
    }

    public function create()
    {
        $instrumento_collection = Instrumento::pluck('nombre','id');
        $instrumento = $instrumento_collection->all();
        $instrumento = array('0' => 'Selecione Instrumento') + $instrumento;
        return view('/integrante/nuevointegrante',['instrumento'=>$instrumento]);
    }

    public function store(Request $request)
    {
        //dd($request->banda);
        $this->validate($request, [
            'nombre' => 'required|max:30|unique:integrante,nombre', 
            'instrumento' => 'numeric|min:1', 
            'estado' => 'required|max:1', 
        ]);
        $integranteb = new Integrante;
        $integranteb->nombre=$request->nombre;
        $integranteb->instrumento_id=$request->instrumento;
        $integranteb->banda_id=$request->banda;
        $integranteb->estado=$request->estado;
        $integranteb->save();
        //return redirect('/integrantes');

        $todos = Integrante::all();
        $muestra_integrante = $todos->where('banda_id', $integranteb->banda_id);
        $muestra_integrante->all();

        $datos_banda = Banda::find($integranteb->banda_id);
        return view('/integrante/muestraintegrantes',['datos_banda'=>$datos_banda,'muestra_integrante'=>$muestra_integrante]);



    }
	
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $instrumento_collection = Instrumento::pluck('nombre','id');
        $instrumento = $instrumento_collection->all();
        $instrumento = array('0' => 'Selecione instrumento') + $instrumento;
        $idintegrante = Integrante::find($id);
        $datos_banda = Banda::find($idintegrante->banda_id);
        return view('/integrante/editaintegrante',['idintegrante'=>$idintegrante,'instrumento'=>$instrumento,'datos_banda'=>$datos_banda]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:30',
            'instrumento' => 'numeric|min:1',  
            'estado' => 'required|max:1', 
        ]);
        $integranteb = Integrante::find($id);
        $integranteb->nombre=$request->nombre;
        $integranteb->instrumento_id=$request->instrumento;
        $integranteb->estado=$request->estado;
        $integranteb->save();
        //return redirect('/integrantes');

        $todos = Integrante::all();
        $muestra_integrante = $todos->where('banda_id', $integranteb->banda_id);
        $muestra_integrante->all();

        $datos_banda = Banda::find($integranteb->banda_id);
        return view('/integrante/muestraintegrantes',['datos_banda'=>$datos_banda,'muestra_integrante'=>$muestra_integrante]);
    }

    public function destroy($id)
    {
        $integranteb = Integrante::find($id);
        $integranteb->delete();
        return redirect('/integrantes');
    }


     public function integrantesxBanda($id)
    {
        $todos = Integrante::all();
        $muestra_integrante = $todos->where('banda_id', $id);
        $muestra_integrante->all();
        $datos_banda = Banda::find($id);
        return view('/integrante/muestraintegrantes',['datos_banda'=>$datos_banda,'muestra_integrante'=>$muestra_integrante]);
    }

    public function creaintegranteBanda($id)
    {
        $instrumento_collection = Instrumento::pluck('nombre','id');
        $instrumento = $instrumento_collection->all();
        $instrumento = array('0' => 'Selecione Instrumento') + $instrumento;
        $datos_banda = Banda::find($id);
        return view('/integrante/nuevointegrante',['instrumento'=>$instrumento,'datos_banda'=>$datos_banda]);
    }
}
