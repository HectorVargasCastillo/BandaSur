{{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Administrador')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Propuestas')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin') !!}
@endsection

{{-- Header Extras to be Included --}}
@section('head-extras')
    @parent
@endsection
  
@section('content')

        
        <div>
            <button type="button" onclick="location.href = '{{ url('/registro_propuestas/creaPropuesta/'.$datos_usuario->id) }}'" class="btn btn-success">Agregar propuesta</button>
        </div>

        <div><h1></h1></div>

        <table border="2" sTYLE="table-layout:fixed">
        	 
        	<tr>
        		<td width="90" height="20" align="center">Id</td>
        		<td width="90" height="20" align="center">Descripcion</td>
                <td width="90" height="20" align="center">Usuario</td>
        		<td width="90" height="20" align="center">Fecha y Hora</td>
				<td colspan="2" width="90" height="20" align="center">Acciones</td>
        	</tr>

            @foreach($listado_registro_propuesta as $registro_propuesta)
            <tr>
                <td align="center">{{ $registro_propuesta->id}}</td>
                <td align="center">{{ $registro_propuesta->descripcion}}</td>
                <td align="center">{{ $registro_propuesta->user->name}}</td>  
				<td align="center">{{ date("d-m-Y H:i:s", strtotime($registro_propuesta->fecha)) }}</td>
                
                <td width="50" height="20" align="center">
                  <a href="{{ url('/registro_propuestas/editaPropuesta/'.$registro_propuesta->id.'/'.$datos_usuario->id)}}" class="btn btn">
                    <img src="/img/editar.png" alt="Editar" title="Editar" style="max-width:100%;width:auto;height:auto;">    
                  <a>
                </td>
                <form class="form-horizontal"  method="POST" action="{{url('/registro_propuestas/'.$registro_propuesta->id)}}">
                  <input name="_method" type="hidden" value="DELETE"> {{ csrf_field() }}
                      <td width="50" height="20" align="center">
					      <button type="submit" class="btn btn-default" onclick="return confirm('¿Esta Seguro de Eliminar?')">
                            <img src="/img/borrar.png" alt="Eliminar" title="Eliminar" style="max-width:100%;width:auto;height:auto;">     
                          </button>
                      </td>
                </form>
           </tr>
            @endforeach
        </table>
@endsection