<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistroPropuesta;
use App\Evento;
use App\User;


class RegistroPropuestaController extends Controller
{
    
    public function creaPropuesta($id)
    {
        $datos_usuario = User::find($id);
        return view('/registro_propuesta/nuevoregistro_propuesta',['datos_usuario'=>$datos_usuario]);
    }

    public function listaPropuesta($id)
    {
        $datos_usuario = User::find($id);
        $listado_registro_propuesta = RegistroPropuesta::all();
        return view("/registro_propuesta/listaregistro_propuesta",['listado_registro_propuesta'=>$listado_registro_propuesta,'datos_usuario'=>$datos_usuario]);
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
        $this->validate($request, [
            'descripcion' => 'required|max:150|unique:registro_propuesta,descripcion',
        ]);
        $fecha = date('Y-m-d H:i:s');
        $registro_propuestab = new RegistroPropuesta;
        $registro_propuestab->descripcion=$request->descripcion;
        $registro_propuestab->users_id=$request->visitante;
        $registro_propuestab->fecha=$fecha;
        $registro_propuestab->save();
        //return redirect()->back();
        $datos_usuario = User::find($request->visitante);
        if ($datos_usuario->is_admin == 0){
            return redirect('/dashboard');
        }else{
            $listado_registro_propuesta = RegistroPropuesta::all();
            return view("/registro_propuesta/listaregistro_propuesta",['listado_registro_propuesta'=>$listado_registro_propuesta,'datos_usuario'=>$datos_usuario]);
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

    public function editaPropuesta($id, $id_usuario)
    {
        $datos_registro_propuesta = RegistroPropuesta::find($id);
        $datos_usuario_visitante = User::find($id_usuario);
        $datos_usuario_propuesta = User::find($datos_registro_propuesta->users_id);
        return view('/registro_propuesta/editaregistro_propuesta',['datos_registro_propuesta'=>$datos_registro_propuesta,'datos_usuario_visitante'=>$datos_usuario_visitante,'datos_usuario_propuesta'=>$datos_usuario_propuesta]);

    }

    public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
            'descripcion' => 'required|max:150',
        ]);
        $registro_propuestab = RegistroPropuesta::find($id);
        $fecha = date('Y-m-d H:i:s');
        $registro_propuestab->descripcion=$request->descripcion;
        $registro_propuestab->users_id=$request->visitante;
        $registro_propuestab->fecha=$fecha;
        $registro_propuestab->save();

        //dd($registro_propuestab);
        
        //$datos_usuario = User::find($id);
        //if ($datos_usuario->is_admin == 0){
            return redirect('/dashboard');
        //}else{
        //    $listado_registro_propuesta = Registropropuesta::all();
        //    return view("/registro_propuesta/listaregistro_propuesta",['listado_registro_propuesta'=>$listado_registro_propuesta,'datos_usuario'=>$datos_usuario]);
       // }
        
    }

    public function destroy($id)
    {
        $registro_propuestab = RegistroPropuesta::find($id);
        $registro_propuestab->delete();
        return redirect('/dashboard');
        
    }
}
