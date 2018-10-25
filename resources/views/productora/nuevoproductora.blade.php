@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO PRODUCTORAS</h1>

@endsection

@section('content')

<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar Productora</h3>
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

            <form class="form-horizontal"  method="POST" action="{{url('/productoras')}}">
                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label" align="left">Nombre Productora</label>
                    <div class="col-sm-10">
                        {{Form::text('nombre', '',['class' => 'form-control'])}}
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="nomfan" class="col-sm-2 control-label" align="left">Nombre Fantasia</label>
                    <div class="col-sm-10">
                        {{Form::text('nomfan', '',['class' => 'form-control'])}}
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
                    <label for="direccion" class="col-sm-2 control-label" align="left">Direccion</label>
                    <div class="col-sm-10">
                        {{Form::text('direccion', '',['class' => 'form-control'])}}
                    </div>
                  </div>
			
				  
				  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label" align="left">Correo</label>
                    <div class="col-sm-10">
                        {{Form::email('email', '',['class' => 'form-control'])}}
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="fono" class="col-sm-2 control-label" align="left">Fono</label>
                    <div class="col-sm-10">
                        {{Form::text('fono', '',['class' => 'form-control'])}}
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="contacto" class="col-sm-2 control-label" align="left">Contacto</label>
                    <div class="col-sm-10">
                        {{Form::text('contacto', '',['class' => 'form-control'])}}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado Productora</label>
                    <div class="col-sm-10">
                           {{Form::radio('estado','V', true)}} Vigente
                           {{Form::radio('estado','X')}} No Vigente
                    </div>
                  </div>
               
                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/productoras') }}'" class="btn btn-info pull-left" >Salir</button>
 
                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                  </div>
                
              </div>
            </form>
</div>
	 
@endsection