      {{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Administrador')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Estado Eventos')

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
                
				<td width="50" height="20" align="center"><a href="{{ url('/estado_eventos/'.$estado_evento->id.'/edit') }}" class="btn btn">
<img src="/img/editar.png" alt="Editar" title="Editar" style="max-width:100%;width:auto;height:auto;">    
                    <a></td>

				

           		<td align="center">
           			<form class="form-horizontal"  method="POST" action="{{url('/estado_eventos/'.$estado_evento->id)}}">
                    <input name="_method" type="hidden" value="DELETE">
                      {{ csrf_field() }}
                        
						<td width="50" height="20" align="center"><button type="submit" class="btn btn-default" 
                            onclick="return confirm('¿Esta Seguro?')">
                            <img src="/img/borrar.png" alt="Eliminar" title="Eliminar" style="max-width:100%;width:auto;height:auto;">     
                            </button>
                        </td>

                     </form>
                </td>
           </tr>
        	@endforeach
        </table>
      

        @endsection