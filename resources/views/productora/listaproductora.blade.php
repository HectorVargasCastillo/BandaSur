        @extends('layouts.backend')

        @section('content')

        <h1>Administrar Productoras</h1>

        <div>
            <button type="button" onclick="location.href = '{{ url('/productoras/create') }}'" class="btn btn-success">Agregar Productora</button>
        </div>
        <div><h1></h1></div>

        <table border="2" sTYLE="table-layout:fixed">
        	 
        	<tr>
        		<td width="90" height="20" align="center">Id</td>
        		<td width="90" height="20" align="center">Nombre</td>
				<td width="90" height="20" align="center">Nombre Fan</td>
                <td width="90" height="20" align="center">Pais</td>
				<td width="90" height="20" align="center">Ciudad</td>
				<td width="90" height="20" align="center">Direccion</td>
				<td width="90" height="20" align="center">Correo</td>
				<td width="90" height="20" align="center">Fono</td>
				<td width="90" height="20" align="center">Contacto</td>
        		<td width="90" height="20" align="center">Estado</td>
            <td colspan="4" width="90" height="20" align="center">Accion</td>
        	</tr>

        	@foreach($listado_productora as $productora)
        	<tr>
        		<td align="center">{{ $productora->id}}</td>
        		<td align="center">{{ $productora->nombre}}</td>
                <td align="center">{{ $productora->nomfan}}</td>
                <td align="center">{{ $productora->pais['nombre']}}</td>
                <td align="center">{{ $productora->ciudad['nombre']}}</td>
				<td align="center">{{ $productora->direccion}}</td>
        		<td align="center">{{ $productora->email}}</td>
				<td align="center">{{ $productora->fono}}</td>
        		<td align="center">{{ $productora->contacto}}</td>

                @if ($productora->estado == "V")
                    <td width="90" height="20" align="center">Vigente</td>
                @else  
                    <td width="90" height="20" align="center">No Vigente</td>  
                @endif
        		<td align="center"><a href="{{ url('/productoras/'.$productora->id.'/edit') }}" class="btn btn-warning pull-right">Editar Productora<a></td>
           		<td align="center">
           			<form class="form-horizontal"  method="POST" action="{{url('/productoras/'.$productora->id)}}">
                    <input name="_method" type="hidden" value="DELETE">
                      {{ csrf_field() }}
                        <td><button type="submit" class="btn btn-danger pull-right" onclick="return confirm('¿Esta Seguro?')">Eliminar Productora</button></td>
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