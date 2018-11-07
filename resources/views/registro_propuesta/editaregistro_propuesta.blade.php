      
{{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Usuario')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Propuestas')

@section('content')



<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Modifica Propuesta Id : {{$datos_registro_propuesta->id}}  perteneciente a Usuario {{$datos_usuario_propuesta->name}}</h3>

              

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

            <form class="form-horizontal"  method="POST" action="{{url('/registro_propuestas/'.$datos_registro_propuesta->id)}}">
                 <input name="_method" type="hidden" value="PUT">

                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label" align="left">Descripcion</label>
                    <div class="col-sm-10">
                        {{Form::textarea('descripcion', $datos_registro_propuesta->descripcion,['class' => 'form-control'])}}
                    </div>
                  </div>
                  
                  <input name="visitante" type="hidden" value="{{$datos_usuario_propuesta->id}}">
                 
                  <div class="box-footer">
   
                    @if ($datos_usuario_visitante->is_admin == 0)
                       <button type="button" onclick="location.href = '{{ url('/dashboard') }}'" class="btn btn-info pull-left" >Salir</button>
                    @else
                       <button type="button" onclick="location.href = '{{ url('/registro_propuestas/listaPropuesta/'.$datos_usuario_visitante->id) }}'" class="btn btn-info pull-left" >Salir</button>
                    @endif
 
                    <button type="submit" class="btn btn-info pull-right">Actualizar Propuesta</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection