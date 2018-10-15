@extends('layouts.general')

@section('content')

<table border="2" sTYLE="table-layout:fixed">
	 <caption>Administrar Estilos</caption>
	<tr>
		<td width="90" height="20" align="center">Id</td>
		<td width="90" height="20" align="center">Nombre</td>
		<td width="90" height="20" align="center">Estado</td>
	</tr>

	@foreach($listado_estilo as $estilo)
	<tr>
		<td align="center">{{ $estilo->id}}</td>
		<td align="center">{{ $estilo->nombre}}</td>
        @if ($estilo->estado == "V")
            <td width="90" height="20" align="center">Vigente</td>
        @else  
            <td width="90" height="20" align="center">No Vigente</td>  
        @endif
		<td align="center"><a href="{{ url('/estilos/'.$estilo->id.'/edit') }}" class="btn btn-warning pull-right">Editar Estilo<a></td>
   		<td align="center">
   			<form class="form-horizontal"  method="POST" action="{{url('/estilos/'.$estilo->id)}}">
            <input name="_method" type="hidden" value="DELETE">
              {{ csrf_field() }}
                <td><button type="submit" class="btn btn-danger pull-right" onclick="return confirm('¿Esta Seguro?')">Eliminar Estilo</button></td>
             </form>
        </td>
   </tr>
	@endforeach
</table>
<div>
	<h1></h1>
</div>
<div>
    <button type="button" onclick="location.href = '{{ url('/menuadm') }}'" class="btn btn-success">Volver</button>
</div>

@endsection