        @extends('layouts.backend')

        @section('content')

       	<h1>No Existen Eventos Registrados</h1>

        <div>
            <button type="button" onclick="location.href = '{{ url('/eventos/create') }}'" class="btn btn-success">Agregar Evento</button>
            <button type="button" onclick="location.href = '{{ url('/dashboard') }}'" class="btn btn-info">Salir</button>
        </div>

        @endsection