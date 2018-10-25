<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instrumento;

class InstrumentoController extends Controller
{
    
    public function index()
    {
		$listado_instrumento = Instrumento::all();
        return view("/instrumento/listainstrumento",['listado_instrumento'=>$listado_instrumento]);
    }

   
    public function create()
    {
        return view('/instrumento/nuevoinstrumento');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:30|unique:instrumento,nombre', 
            'estado' => 'required|max:1', 
        ]);
        $instrumentob = new Instrumento;
        $instrumentob->nombre=$request->nombre;
        $instrumentob->estado=$request->estado;
        $instrumentob->save();
        //return redirect()->back();
        return redirect('/instrumentos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $idinstrumento = Instrumento::find($id);
        return view("/instrumento/editainstrumento",['idinstrumento'=>$idinstrumento]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:30', 
            'estado' => 'required|max:1', 
        ]);
        $instrumentob = Instrumento::find($id);
        $instrumentob->nombre=$request->nombre;
        $instrumentob->estado=$request->estado;
        $instrumentob->save();
        return redirect('/instrumentos');
    }

    public function destroy($id)
    {
        $instrumentob = Instrumento::find($id);
        $instrumentob->delete();
        return redirect('/instrumentos');
    }
}
