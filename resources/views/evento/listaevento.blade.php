        @extends('layouts.backend')

        @section('content')

        <h1>Administrar Eventos</h1>

        <div>
            <button type="button" onclick="location.href = '{{ url('/eventos/create') }}'" class="btn btn-success">Agregar Evento</button>
        </div>
        <div><h1></h1></div>

        <table border="2" sTYLE="table-layout:fixed">
        	 
        	<tr>
        		<td width="90" height="20" align="center">Id</td>
        		<td width="90" height="20" align="center">Nombre</td>
				<td width="90" height="20" align="center">Pais</td>
				<td width="90" height="20" align="center">Ciudad</td>
				<td width="90" height="20" align="center">Recinto</td>
				<td width="90" height="20" align="center">Fecha</td>
                <td width="90" height="20" align="center">Hora</td>
				<td width="90" height="20" align="center">Banda</td>
				<td width="90" height="20" align="center">Productora</td>
				<td width="90" height="20" align="center">Estado</td>
            <td colspan="6" width="90" height="20" align="center">Accion</td>
        	</tr>

        	@foreach($listado_evento as $evento)
        	<tr>
        		<td align="center">{{ $evento->id}}</td>
        		<td align="center">{{ $evento->nombre}}</td>
                <td align="center">{{ $evento->pais['nombre']}}</td>
				<td align="center">{{ $evento->ciudad['nombre']}}</td>
				<td align="center">{{ $evento->recinto}}</td>
				<td align="center">{{ date("d-m-Y", strtotime($evento->fecha)) }}</td>
               <!-- <td align="center">{{ $evento->fecha}}</td> -->
				<td align="center">{{ $evento->hora}}</td>
                <td align="center">{{ $evento->banda['nombre']}}</td>
				<td align="center">{{ $evento->productora['nombre']}}</td>
                @if ($evento->estado == "V")
                    <td width="90" height="20" align="center">Vigente</td>
                @else  
                    <td width="90" height="20" align="center">No Vigente</td>  
                @endif
				<td align="center"><a href="{{ url('/eventos/'.$evento->id.'/edit') }}" class="btn btn-warning pull-right">Editar evento<a></td>

           		<td align="center">
           			<form class="form-horizontal"  method="POST" action="{{url('/eventos/'.$evento->id)}}">
                    <input name="_method" type="hidden" value="DELETE">
                      {{ csrf_field() }}
                        <td><button type="submit" class="btn btn-danger pull-right" onclick="return confirm('¿Esta Seguro?')">Eliminar evento</button></td>
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