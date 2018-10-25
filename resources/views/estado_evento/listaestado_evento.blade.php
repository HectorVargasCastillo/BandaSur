        @extends('layouts.backend')

        @section('content')

        <h1>Administrar Estado Eventos</h1>

        <div>
            <button type="button" onclick="location.href = '{{ url('/estado_eventos/create') }}'" class="btn btn-success">Agregar Estado</button>
        </div>
        <div><h1></h1></div>

        <table border="2" sTYLE="table-layout:fixed">
        	 
        	<tr>
        		<td width="90" height="20" align="center">Id</td>
        		<td width="90" height="20" align="center">Descripcion</td>
        		
            <td colspan="4" width="90" height="20" align="center">Accion</td>
        	</tr>

        	@foreach($listado_estado_evento as $estado_evento)
        	<tr>
        		<td align="center">{{ $estado_evento->id}}</td>
        		<td align="center">{{ $estado_evento->descripcion}}</td>
                <td align="center"><a href="{{ url('/estado_eventos/'.$estado_evento->id.'/edit') }}" class="btn btn-warning pull-right">Editar Estado<a></td>
           		<td align="center">
           			<form class="form-horizontal"  method="POST" action="{{url('/estado_eventos/'.$estado_evento->id)}}">
                    <input name="_method" type="hidden" value="DELETE">
                      {{ csrf_field() }}
                        <td><button type="submit" class="btn btn-danger pull-right" onclick="return confirm('¿Esta Seguro?')">Eliminar Estado</button></td>
                     </form>
                </td>
           </tr>
        	@endforeach
        </table>
        <div>
        	<h1></h1>
        </div>
        <div>
            <button type="button" onclick="location.href = '{{ url('/dashboard') }}'" class="btn btn-info">Salir</button>
        </div>

        @endsection