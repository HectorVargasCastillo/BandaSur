      
{{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Administrador')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Eventos')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin') !!}
@endsection

{{-- Header Extras to be Included --}}
@section('head-extras')
    @parent
@endsection


        @section('content')

         <?php
            
            $usuario = Auth::user()->id;
            ?>

         
<li>
            <a href="">
                <i class="fa fa-user-secret"></i> <span>{{$usuario}}</span>
            </a>
</li>

      
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
                <td colspan="2" width="10" height="20" align="center">Acciones</td> 
                
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

				<td width="50" height="20" align="center">

                   
                    <a href="{{ url('/eventos/'.$evento->id.'/edit') }}" class="btn btn">
<img src="/img/editar.png" alt="Editar" title="Editar" style="max-width:100%;width:auto;height:auto;">    
                    </a>

                  </td>  


                    <form class="form-horizontal"  method="POST" action="{{url('/eventos/'.$evento->id)}}">
                    <input name="_method" type="hidden" value="DELETE">
                      {{ csrf_field() }}
                     <td width="50" height="20" align="center">  
                            <button type="submit" class="btn btn-default" 
                            onclick="return confirm('¿Esta Seguro?')">
                            <img src="/img/borrar.png" alt="Eliminar" title="Eliminar" style="max-width:100%;width:auto;height:auto;">     
                            </button>
                        </td>  
                     </form>

                 </td>

           </tr>
        	@endforeach
        </table>

        <!--28.10.2018
        <div>
        	<h1></h1>
        </div>
        <div>
            <button type="button" onclick="location.href = '{{ url('/dashboard') }}'" class="btn btn-info">Salir</button>
        </div>
        -->
        @endsection