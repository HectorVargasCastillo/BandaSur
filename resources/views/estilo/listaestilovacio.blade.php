        @extends('layouts.backend')

        @section('content')

        <h4>No Existen Registros</h4>

        <div>
            <button type="button" onclick="location.href = '{{ url('/estilos/create') }}'" class="btn btn-success">Agregar Estilo</button>
            <button type="button" onclick="location.href = '{{ url('/dashboard') }}'" class="btn btn-info">Salir</button>
        </div>
        </div>
        <div><h1></h1></div>

      
        <div>
        	<h1></h1>
        </div>
       

        @endsection