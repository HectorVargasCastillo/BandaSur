        @extends('layouts.backend')

        @section('content')

        <h1>Administrar Bandas</h1>

        <div>
            <button type="button" onclick="location.href = '{{ url('/bandas/create') }}'" class="btn btn-success">Agregar Banda</button>
        </div>
        <div><h1></h1></div>

        <table border="2" sTYLE="table-layout:fixed">
        	 
        	<tr>
        		<td width="90" height="20" align="center">Id</td>
        		<td width="90" height="20" align="center">Nombre</td>
				<td width="90" height="20" align="center">Pais</td>
				<td width="90" height="20" align="center">Ciudad</td>
				<td width="90" height="20" align="center">Estilo</td>
                <td width="90" height="20" align="center">Representante</td>
				<td width="90" height="20" align="center">Estado</td>
            <td colspan="6" width="90" height="20" align="center">Accion</td>
        	</tr>

        	@foreach($listado_banda as $banda)
        	<tr>
        		<td align="center">{{ $banda->id}}</td>
        		<td align="center">{{ $banda->nombre}}</td>
                <td align="center">{{ $banda->pais['nombre']}}</td>
                <td align="center">{{ $banda->ciudad['nombre']}}</td>
				<td align="center">{{ $banda->estilo['nombre']}}</td>
                <td align="center">{{ $banda->representante}}</td>
                @if ($banda->estado == "V")
                    <td width="90" height="20" align="center">Vigente</td>
                @else  
                    <td width="90" height="20" align="center">No Vigente</td>  
                @endif


				<td align="center"><a href="{{ url('/integrantes/integrantesxBanda/'.$banda->id) }}" class="btn btn-primary">Integrantes<a></td>

        		<td align="center"><a href="{{ url('/bandas/'.$banda->id.'/edit') }}" class="btn btn-warning pull-right">Editar Banda<a></td>

           		<td align="center">
           			<form class="form-horizontal"  method="POST" action="{{url('/bandas/'.$banda->id)}}">
                    <input name="_method" type="hidden" value="DELETE">
                      {{ csrf_field() }}
                        <td><button type="submit" class="btn btn-danger pull-right" onclick="return confirm('¿Esta Seguro?')">Eliminar Banda</button></td>
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