@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO EVENTOS</h1>

@endsection

@section('content')

<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar Evento</h3>
            </div>
                    @if(count($errors) > 0)
                        <div class="errors">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('flash_message'))
                        {{Session::get('flash_message')}}
                    @endif 

            <form class="form-horizontal"  method="POST" action="{{url('/eventos')}}">
                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label" align="left">Nombre Evento</label>
                    <div class="col-sm-10">
                        {{Form::text('nombre', '',['class' => 'form-control'])}}
                    </div>
                  </div>
				   
                  <div class="form-group">
                    <label for="pais" class="col-sm-2 control-label">Pais</label>
                    <div class="col-sm-10">
                           {{Form::select('pais', $pais,0,['class' => 'form-control'])}} 
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
                    <div class="col-sm-10">
                           {{Form::select('ciudad', $ciudad,0,['class' => 'form-control'])}} 
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="recinto" class="col-sm-2 control-label" align="left">Recinto</label>
                    <div class="col-sm-10">
                        {{Form::text('recinto', '',['class' => 'form-control'])}}
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="fecha" class="col-sm-2 control-label" align="left">Fecha Evento</label>
                    <div class="col-sm-10">
                        {{Form::date('fecha', '',['class' => 'form-control'])}}
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="hora" class="col-sm-2 control-label" align="left">Hora Evento</label>
                    <div class="col-sm-10">
                        {{Form::time('hora', '',['class' => 'form-control'])}}
                    </div>
                  </div>
				  
				         <div class="form-group">
                    <label for="banda" class="col-sm-2 control-label">Banda</label>
                    <div class="col-sm-10">
                           {{Form::select('banda', $banda,0,['class' => 'form-control'])}} 
                    </div>
                  </div>

				          <div class="form-group">
                    <label for="productora" class="col-sm-2 control-label">Productora</label>
                    <div class="col-sm-10">
                           {{Form::select('productora', $productora,0,['class' => 'form-control'])}} 
                    </div>
                  </div>
			
                    <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado Evento</label>
                    <div class="col-sm-10">
                           {{Form::select('estado_evento', $estado_evento,0,['class' => 'form-control'])}} 
                    </div>
                  </div>
               
                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/eventos') }}'" class="btn btn-info pull-left" >Salir</button>
 
                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection