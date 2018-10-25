@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO ESTILOS</h1>

@endsection



@section('content')



<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
           <div class="box-header with-border">
              <h3 class="box-title">Ingresar Estilo</h3>
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

            <!--<form class="form-horizontal"  method="POST" action="{{url('/estilos')}}">-->
              <form class="contenedor-form"  method="POST" action="{{url('/estilos')}}">
                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label" align="left">Nombre Estilo</label>
                    <div class="col-sm-10">
                        {{Form::text('nombre', '',['class' => 'form-control'])}}
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <h1></h1>
                  </div>

                   <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado Estilo</label>
                    <div class="col-sm-10">
                           {{Form::radio('estado','V', true)}} Vigente
                           {{Form::radio('estado','X')}} No Vigente
                    </div>
                  </div>

                  @section('someSection')

                   @if($registros == 0)
                     {{ $ruta = 'dashboard' }}
                  @else
                      {{ $ruta = 'estilos' }}
                  @endif
  
                  @endsection
                
                 
                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/'.$ruta)}}'" 
                    class="btn btn-info pull-left" >Salir</button>
                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection