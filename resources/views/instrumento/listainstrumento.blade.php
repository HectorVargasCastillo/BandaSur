       {{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Administrador')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Instrumento')

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
            <button type="button" onclick="location.href = '{{ url('/instrumentos/create') }}'" class="btn btn-success">Agregar Instrumento</button>
        </div>
        <div><h1></h1></div>

        <table border="2" sTYLE="table-layout:fixed">
        	 
        	<tr>
        		<td width="90" height="20" align="center">Id</td>
        		<td width="90" height="20" align="center">Nombre</td>
        		<td width="90" height="20" align="center">Estado</td>
            <td colspan="2" width="90" height="20" align="center">Acciones</td>
        	</tr>

        	@foreach($listado_instrumento as $instrumento)
        	<tr>
        		<td align="center">{{ $instrumento->id}}</td>
        		<td align="center">{{ $instrumento->nombre}}</td>
                @if ($instrumento->estado == "V")
                    <td width="90" height="20" align="center">Vigente</td>
                @else  
                    <td width="90" height="20" align="center">No Vigente</td>  
                @endif

        		<td width="50" height="20" align="center"><a href="{{ url('/instrumentos/'.$instrumento->id.'/edit') }}" class="btn btn">
<img src="/img/editar.png" alt="Editar" title="Editar" style="max-width:100%;width:auto;height:auto;">    
                    <a></td>

           		
           			<form class="form-horizontal"  method="POST" action="{{url('/instrumentos/'.$instrumento->id)}}">
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