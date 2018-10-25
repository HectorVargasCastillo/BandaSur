@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO ESTADO EVENTOS</h1>

@endsection

@section('content')

<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar Estado Evento</h3>
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

            <form class="form-horizontal"  method="POST" action="{{url('/estado_eventos')}}">
                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label" align="left">Descripcion</label>
                    <div class="col-sm-10">
                        {{Form::text('descripcion', '',['class' => 'form-control'])}}
                    </div>
                  </div>

                   
               
                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/estado_eventos') }}'" class="btn btn-info pull-left" >Salir</button>
 
                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection