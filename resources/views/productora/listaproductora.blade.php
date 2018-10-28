{{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Administrador')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Productoras')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin') !!}
@endsection

{{-- Header Extras to be Included --}}
@section('head-extras')
    @parent
@endsection

@section("content")

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
            <td colspan="2" width="90" height="20" align="center">Acciones</td>
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
        		<td width="50" height="20" align="center"><a href="{{ url('/productoras/'.$productora->id.'/edit') }}" class="btn btn">
<img src="/img/editar.png" alt="Editar" title="Editar" style="max-width:100%;width:auto;height:auto;">    
                    <a></td>
				
				
           		
           			<form class="form-horizontal"  method="POST" action="{{url('/productoras/'.$productora->id)}}">
                    <input name="_method" type="hidden" value="DELETE">
                      {{ csrf_field() }}
                        <td width="50" height="20" align="center"><button type="submit" class="btn btn-default" 
                            onclick="return confirm('¿Esta Seguro?')">
                            <img src="/img/borrar.png" alt="Eliminar" title="Eliminar" style="max-width:100%;width:auto;height:auto;">     
                            </button>
                        </td>
					 
					 </form>
              
				
           </tr>
        	@endforeach
        </table>
       

        @endsection