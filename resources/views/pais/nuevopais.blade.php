@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO PAISES</h1>

@endsection

@section('content')

<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar Pais</h3>
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

            <form class="form-horizontal"  method="POST" action="{{url('/paises')}}">
                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label" align="left">Nombre Pais</label>
                    <div class="col-sm-10">
                        {{Form::text('nombre', '',['class' => 'form-control'])}}
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado Pais</label>
                    <div class="col-sm-10">
                           {{Form::radio('estado','V', true)}} Vigente
                           {{Form::radio('estado','X')}} No Vigente
                    </div>
                  </div>
               
                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/paises') }}'" class="btn btn-info pull-left" >Salir</button>
 
                    <button type="submit" onclick="location.href = '{{ url('/paises') }}'" class="btn btn-info pull-right">Guardar</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection