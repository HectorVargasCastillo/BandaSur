@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO ESTILOS</h1>

@endsection

@section('content')

<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Modifica Estilo Id : {{$idestilo->id}}</h3>
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

            <form class="form-horizontal"  method="POST" action="{{url('/estilos/'.$idestilo->id)}}">
                 <input name="_method" type="hidden" value="PUT">

                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label" align="left">Nombre Estilo</label>
                    <div class="col-sm-10">
                        {{Form::text('nombre', $idestilo->nombre,['class' => 'form-control'])}}
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado Estilo</label>
                    <div class="col-sm-10">
                      @if ($idestilo->estado == 'V')
                           {{Form::radio('estado','V', true)}} Vigente
                           {{Form::radio('estado','X', false)}} No Vigente
                      @else
                           {{Form::radio('estado','V', false)}} Vigente
                           {{Form::radio('estado','X', true)}} No Vigente
                      @endif     
                    </div>
                  </div>


                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/estilos') }}'" class="btn btn-info pull-left" >Salir</button>
 
                    <button type="submit" class="btn btn-info pull-right">Actualiar Estilo</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection