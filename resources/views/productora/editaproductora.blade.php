@extends('layouts.backend')

@section('title')

	<h1>FORMULARIO PRODUCTORAS</h1>

@endsection

@section('content')

<div class="box box-info" style="width:900px;height:50px;background-color:yellow;">
            <div class="box-header with-border">
              <h3 class="box-title">Modifica Productora Id : {{$idproductora->id}}</h3>
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

            <form class="form-horizontal"  method="POST" action="{{url('/productoras/'.$idproductora->id)}}">
                 <input name="_method" type="hidden" value="PUT">

                   {{ csrf_field() }}
              <div class="box-body">

                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label" align="left">Nombre Productora</label>
                    <div class="col-sm-10">
                        {{Form::text('nombre', $idproductora->nombre,['class' => 'form-control'])}}
                    </div>
                  </div>
				  
				   <div class="form-group">
                    <label for="nomfan" class="col-sm-2 control-label" align="left">Nombre Fantasia</label>
                    <div class="col-sm-10">
                        {{Form::text('nomfan', $idproductora->nomfan,['class' => 'form-control'])}}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pais" class="col-sm-2 control-label">Pais</label>
                    <div class="col-sm-10">
                         {{Form::select('pais', $pais,$idproductora->pais_id,['class' => 'form-control'])}} 
                    </div>
                  </div>

				  <div class="form-group">
                    <label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
                    <div class="col-sm-10">
                         {{Form::select('ciudad', $ciudad,$idproductora->ciudad_id,['class' => 'form-control'])}} 
                    </div>
                  </div>

				 <div class="form-group">
                    <label for="direccion" class="col-sm-2 control-label" align="left">Direccion</label>
                    <div class="col-sm-10">
                        {{Form::text('direccion', $idproductora->direccion,['class' => 'form-control'])}}
                    </div>
         </div>
				  
				 <div class="form-group">
                    <label for="email" class="col-sm-2 control-label" align="left">Correo</label>
                    <div class="col-sm-10">
                        {{Form::email('email', $idproductora->email,['class' => 'form-control'])}}
                    </div>
          </div>
				  
				  <div class="form-group">
                    <label for="fono" class="col-sm-2 control-label" align="left">Fono</label>
                    <div class="col-sm-10">
                        {{Form::text('fono', $idproductora->fono,['class' => 'form-control'])}}
                    </div>
          </div>
				  
				  <div class="form-group">
                    <label for="contacto" class="col-sm-2 control-label" align="left">Contacto</label>
                    <div class="col-sm-10">
                        {{Form::text('contacto', $idproductora->contacto,['class' => 'form-control'])}}
                    </div>
                  </div>
				  

                   <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado Productora</label>
                    <div class="col-sm-10">
                      @if ($idproductora->estado == 'V')
                           {{Form::radio('estado','V', true)}} Vigente
                           {{Form::radio('estado','X', false)}} No Vigente
                      @else
                           {{Form::radio('estado','V', false)}} Vigente
                           {{Form::radio('estado','X', true)}} No Vigente
                      @endif     
                    </div>
                  </div>


                  <div class="box-footer">
                    <button type="button" onclick="location.href = '{{ url('/productoras') }}'" class="btn btn-info pull-left" >Salir</button>
 
                    <button type="submit" class="btn btn-info pull-right">Actualiar Productora</button>
                  </div>
                
                </div>
            </form>
</div>
	 
@endsection