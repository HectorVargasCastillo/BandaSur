<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistroDonacion;
use App\Evento;
use App\User;


class RegistroDonacionController extends Controller
{
    
    public function creaDonacion($id)
    {
        //
        $datos_usuario = User::find($id);
        $evento_collection = Evento::pluck('nombre','id');
        $evento = $evento_collection->all();
        $evento = array('0' => 'Selecione Evento') + $evento;
        return view('/registro_donacion/nuevoregistro_donacion',['evento'=>$evento,'datos_usuario'=>$datos_usuario]);
    }

    public function listaDonacion($id)
    {
        $datos_usuario = User::find($id);
        $listado_registro_donacion = RegistroDonacion::all();
        return view("/registro_donacion/listaregistro_donacion",['listado_registro_donacion'=>$listado_registro_donacion,'datos_usuario'=>$datos_usuario]);
    }

    public function index()
    {
        //
        $listado_registro_donacion = RegistroDonacion::all();
        return view("/registro_donacion/listaregistro_donacion",['listado_registro_donacion'=>$listado_registro_donacion]);
    }

    
    public function create()
    {
        //
        $idusuario = Auth::user()->id;
        $datos_usuario = Users::find($idusuario->id);

        $evento_collection = Evento::pluck('nombre','id');
        $evento = $evento_collection->all();
        $evento = array('0' => 'Selecione Evento') + $evento;

        dd('hola');
        return view('/registro_donacion/nuevoregistro_donacion',['evento'=>$evento,'datos_usuario'=>$datos_usuario]);
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
