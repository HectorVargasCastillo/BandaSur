@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO INTEGRANTES</h1>

@endsection

@section('content')

<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar Integrante de Banda {{$datos_banda->nombre}} [{{$datos_banda->id}}]</h3>
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

            <form class="form-horizontal"  method="POST" action="{{url('/integrantes')}}">
                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label" align="left">Nombre Integrante</label>
                    <div class="col-sm-10">
                        {{Form::text('nombre', '',['class' => 'form-control'])}}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="instrumento" class="col-sm-2 control-label">Instrumento</label>
                    <div class="col-sm-10">
                           {{Form::select('instrumento', $instrumento,0,['class' => 'form-control'])}} 
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado Integrante</label>
                    <div class="col-sm-10">
                           {{Form::radio('estado','V', true)}} Vigente
                           {{Form::radio('estado','X')}} No Vigente
                    </div>
                  </div>


                  <input name="banda" type="hidden" value="{{$datos_banda->id}}">
               
                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/integrantes') }}'" class="btn btn-info pull-left" >Salir</button>
 
                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection