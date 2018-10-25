<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productora;
use App\Pais;
use App\Ciudad;

class ProductoraController extends Controller
{
    
    public function index()
    {
        $listado_productora = Productora::all();
        return view("/productora/listaproductora",['listado_productora'=>$listado_productora]);
    }

   
    public function create()
    {
        $pais_collection = Pais::pluck('nombre','id');
        $pais = $pais_collection->all();
        $pais = array('0' => 'Selecione Pais') + $pais;
		
		$ciudad_collection = Ciudad::pluck('nombre','id');
        $ciudad = $ciudad_collection->all();
        $ciudad = array('0' => 'Selecione Ciudad') + $ciudad;
		
        return view('/productora/nuevoproductora',['pais'=>$pais,'ciudad'=>$ciudad]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:30|unique:productora,nombre',
            'nomfan' => 'required|max:30|unique:productora,nomfan', 
            'pais' => 'numeric|min:1', 
			'ciudad' => 'numeric|min:1', 
			'direccion' => 'required|max:30|unique:productora,direccion', 
			'email' => 'required|max:30|unique:productora,email', 
			'fono' => 'required|max:30|unique:productora,fono', 
			'contacto' => 'required|max:30|unique:productora,contacto', 
            'estado' => 'required|max:1', 
        ]);
        $productorab = new Productora;
        $productorab->nombre=$request->nombre;
		$productorab->nomfan=$request->nomfan;
        $productorab->pais_id=$request->pais;
		$productorab->ciudad_id=$request->ciudad;
		$productorab->direccion=$request->direccion;
		$productorab->email=$request->email;
		$productorab->fono=$request->fono;
		$productorab->contacto=$request->contacto;
        $productorab->estado=$request->estado;
        $productorab->save();
        //return redirect()->back();
        return redirect('/productoras');
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
        $idproductora = Productora::find($id);
        return view('/productora/editaproductora',['idproductora'=>$idproductora,'pais'=>$pais,'ciudad'=>$ciudad]);
    }

   
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nombre' => 'required|max:30',
            'nomfan' => 'required|max:30', 
            'pais' => 'numeric|min:1', 
			'ciudad' => 'numeric|min:1', 
			'direccion' => 'required|max:30', 
			'email' => 'required|max:30', 
			'fono' => 'required|max:30', 
			'contacto' => 'required|max:30', 
            'estado' => 'required|max:1', 
        ]);
        $productorab = Productora::find($id);
        $productorab->nombre=$request->nombre;
        $productorab->nomfan=$request->nomfan;
        $productorab->pais_id=$request->pais;
		$productorab->ciudad_id=$request->ciudad;
		$productorab->direccion=$request->direccion;
		$productorab->email=$request->email;
		$productorab->fono=$request->fono;
		$productorab->contacto=$request->contacto;
        $productorab->estado=$request->estado;
        $productorab->save();
        return redirect('/productoras');
    }

    public function destroy($id)
    {
        $productorab = Productora::find($id);
        $productorab->delete();
        return redirect('/productoras');
    }
}
