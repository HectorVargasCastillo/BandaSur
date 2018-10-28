      {{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Administrador')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Bandas')

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
            <td colspan="6" width="10" height="20" align="center">Acciones</td>
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


				<!--28.10.2018<td align="center"><a href="{{ url('/integrantes/integrantesxBanda/'.$banda->id) }}" class="btn btn-primary">Integrantes<a></td>-->
 <td width="50" height="20" align="center"><a href="{{ url('/integrantes/integrantesxBanda/'.$banda->id) }}" class="btn btn-default">
<img src="/img/integrante.png" alt="Integrantes" title="Intergrantes" style="max-width:100%;width:auto;height:auto;">    
                    <a></td>   
        		


         <td width="50" height="20" align="center"><a href="{{ url('/bandas/'.$banda->id.'/edit') }}" class="btn btn">
<img src="/img/editar.png" alt="Editar" title="Editar" style="max-width:100%;width:auto;height:auto;">    
                    <a></td>


               
                    


<form class="form-horizontal"  method="POST" action="{{url('/bandas/'.$banda->id)}}">
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