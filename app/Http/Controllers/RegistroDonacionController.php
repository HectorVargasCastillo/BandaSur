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
        
    }

    
    public function create()
    {
        //
        
    }

    
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'descripcion' => 'required|max:30|unique:registro_donacion,descripcion',
            'evento' => 'numeric|min:1', 
            'monto' => 'required|numeric|min:5', 
        ]);
        $tipomone = 1;
        $registro_donacionb = new RegistroDonacion;
        $registro_donacionb->descripcion=$request->descripcion;
        $registro_donacionb->users_id=$request->visitante;
        $registro_donacionb->evento_id=$request->evento;
        $registro_donacionb->tipomone_id=$tipomone;
        $registro_donacionb->monto=$request->monto;
        $registro_donacionb->save();
        //return redirect()->back();
        $datos_usuario = User::find($request->visitante);
        if ($datos_usuario->is_admin == 0){
            return redirect('/dashboard');
        }else{
            $listado_registro_donacion = RegistroDonacion::all();
            return view("/registro_donacion/listaregistro_donacion",['listado_registro_donacion'=>$listado_registro_donacion,'datos_usuario'=>$datos_usuario]);
        }
        
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //

       
    }


    public function editaDonacion($id, $id_usuario)
    {
        //
        //dd($id,$id_usuario);
        $evento_collection = Evento::pluck('nombre','id');
        $evento = $evento_collection->all();
        $evento = array('0' => 'Selecione Evento') + $evento;
        $datos_registro_donacion = RegistroDonacion::find($id);
        $datos_usuario_visitante = User::find($id_usuario);
        $datos_usuario_donacion = User::find($datos_registro_donacion->users_id);
        return view('/registro_donacion/editaregistro_donacion',['datos_registro_donacion'=>$datos_registro_donacion,'datos_usuario_visitante'=>$datos_usuario_visitante,'datos_usuario_donacion'=>$datos_usuario_donacion,'evento'=>$evento]);

    }

    public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
            'descripcion' => 'required|max:30',
            'evento' => 'numeric|min:1', 
            'monto' => 'required|numeric|min:5', 
        ]);
        $registro_donacionb = RegistroDonacion::find($id);
        $tipomone = 1;
        $registro_donacionb->descripcion=$request->descripcion;
        $registro_donacionb->users_id=$request->visitante;
        $registro_donacionb->evento_id=$request->evento;
        $registro_donacionb->tipomone_id=$tipomone;
        $registro_donacionb->monto=$request->monto;
        $registro_donacionb->save();

        //dd($registro_donacionb);
        
        //$datos_usuario = User::find($id);
        //if ($datos_usuario->is_admin == 0){
            return redirect('/dashboard');
        //}else{
        //    $listado_registro_donacion = RegistroDonacion::all();
        //    return view("/registro_donacion/listaregistro_donacion",['listado_registro_donacion'=>$listado_registro_donacion,'datos_usuario'=>$datos_usuario]);
       // }
        
    }




    
    public function destroy($id)
    {
        //
        $registro_donacionb = RegistroDonacion::find($id);
        $registro_donacionb->delete();
        return redirect('/dashboard');
        
    }
}
