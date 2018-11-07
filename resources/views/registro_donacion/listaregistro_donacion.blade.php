{{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Administrador')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Donaciones')

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
            <button type="button" onclick="location.href = '{{ url('/registro_donaciones/creaDonacion/'.$datos_usuario->id) }}'" class="btn btn-success">Agregar Donacion</button>
        </div>

        <div><h1></h1></div>

        <table border="2" sTYLE="table-layout:fixed">
        	 
        	<tr>
        		<td width="90" height="20" align="center">Id</td>
        		<td width="90" height="20" align="center">Descripcion</td>
                <td width="90" height="20" align="center">Usuario</td>
        		<td width="90" height="20" align="center">Evento</td>
				<td width="90" height="20" align="center">Monto</td>
            <td colspan="2" width="90" height="20" align="center">Acciones</td>
        	</tr>

            @foreach($listado_registro_donacion as $registro_donacion)
            <tr>
                <td align="center">{{ $registro_donacion->id}}</td>
                <td align="center">{{ $registro_donacion->descripcion}}</td>
                <td align="center">{{ $registro_donacion->user->name}}</td>  
                <td align="center">{{ $registro_donacion->evento['nombre']}}</td>
                <td align="center">{{ $registro_donacion->monto}}</td>

                <td width="50" height="20" align="center">

                  <a href="{{ url('/registro_donaciones/editaDonacion/'.$registro_donacion->id.'/'.$datos_usuario->id)}}" class="btn btn">

                <img src="/img/editar.png" alt="Editar" title="Editar" style="max-width:100%;width:auto;height:auto;">    
                    <a>


                    </td>
                    <form class="form-horizontal"  method="POST" action="{{url('/registro_donaciones/'.$registro_donacion->id)}}">
                    <input name="_method" type="hidden" value="DELETE">
                      {{ csrf_field() }}
                        <td width="50" height="20" align="center"><button type="submit" class="btn btn-default" 
                            onclick="return confirm('¿Esta Seguro de Eliminar?')">
                            <img src="/img/borrar.png" alt="Eliminar" title="Eliminar" style="max-width:100%;width:auto;height:auto;">     
                            </button>
                        </td>
                     </form>
           </tr>
            @endforeach
        </table>
@endsection