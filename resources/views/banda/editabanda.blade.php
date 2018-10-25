@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO BANDAS</h1>

@endsection

@section('content')

<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Modifica Banda Id : {{$idbanda->id}}</h3>
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

            <form class="form-horizontal"  method="POST" action="{{url('/bandas/'.$idbanda->id)}}">
                 <input name="_method" type="hidden" value="PUT">

                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label" align="left">Nombre Banda</label>
                    <div class="col-sm-10">
                        {{Form::text('nombre', $idbanda->nombre,['class' => 'form-control'])}}
                    </div>
                  </div>
				  
				   
                  <div class="form-group">
                    <label for="pais" class="col-sm-2 control-label">Pais</label>
                    <div class="col-sm-10">
                         {{Form::select('pais', $pais,$idbanda->pais_id,['class' => 'form-control'])}} 
                    </div>
                  </div>

				  <div class="form-group">
                    <label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
                    <div class="col-sm-10">
                         {{Form::select('ciudad', $ciudad,$idbanda->ciudad_id,['class' => 'form-control'])}} 
                    </div>
                  </div>
				  
				          <div class="form-group">
                    <label for="estilo" class="col-sm-2 control-label">Estilo</label>
                    <div class="col-sm-10">
                         {{Form::select('estilo', $estilo,$idbanda->estilo_id,['class' => 'form-control'])}} 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="representante" class="col-sm-2 control-label" align="left">Representante</label>
                    <div class="col-sm-10">
                        {{Form::text('representante', $idbanda->representante,['class' => 'form-control'])}}
                    </div>
                  </div>
 
                   <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado Banda</label>
                    <div class="col-sm-10">
                      @if ($idbanda->estado == 'V')
                           {{Form::radio('estado','V', true)}} Vigente
                           {{Form::radio('estado','X', false)}} No Vigente
                      @else
                           {{Form::radio('estado','V', false)}} Vigente
                           {{Form::radio('estado','X', true)}} No Vigente
                      @endif     
                    </div>
                  </div>


                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/bandas') }}'" class="btn btn-info pull-left" >Salir</button>
 
                    <button type="submit" class="btn btn-info pull-right">Actualizar Banda</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection