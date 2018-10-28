<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU PRINCIPAL</li>

     <?php 
        $id_usuario = Auth::user()->id; 
        $is_admin = Auth::user()->is_admin; 
     ?>

    <li class="{{ \App\Utils::checkRoute(['dashboard::index', 'admin::index']) ? 'active': '' }}">
    	@if ($is_admin == 0){
			<a href="{{ url('/registro_donaciones/creaDonacion/'.$id_usuario) }}">
            	<i class="fa fa-dashboard"></i> <span>Registro Donaciones</span>
        	</a>

        @else
			<a href="{{ url('/registro_donaciones/listaDonacion/'.$id_usuario) }}">
            	<i class="fa fa-dashboard"></i> <span>Registro Donaciones</span>
        	</a>
        @endif
 	    
       <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Registro Propuestas</span>
        </a>

    </li>
    @if (Auth::user()->can('viewList', \App\User::class))
        <li class="{{ \App\Utils::checkRoute(['admin::users.index', 'admin::users.create']) ? 'active': '' }}">
            <a href="{{ route('admin::users.index') }}">
                <i class="fa fa-user-secret"></i> <span>Usuarios</span>
            </a>
			<a href="{{ url('/eventos') }}">
				<i class="fa fa-user-secret"></i> <span>Eventos</span>
			</a>
			<a href="{{ url('/bandas') }}">
				<i class="fa fa-user-secret"></i> <span>Bandas</span>
			</a>
            <a href="{{url('/estilos')}}">
				<i class="fa fa-user-secret"></i> <span>Estilos</span>
			</a>
			<a href="{{url('/productoras')}}">
				<i class="fa fa-user-secret"></i> <span>Productora</span>
			</a>
            <a href={{url('/estado_eventos')}}>
				<i class="fa fa-user-secret"></i> <span>Estado Eventos</span>
			</a>
			<a href={{url('/paises')}}>
				<i class="fa fa-user-secret"></i> <span>Paises</span>
			</a>
			<a href={{url('/ciudades')}}>
				<i class="fa fa-user-secret"></i> <span>Ciudades</span>
			</a>
			<a href={{url('/instrumentos')}}>
				<i class="fa fa-user-secret"></i> <span>Instrumentos</span>
			</a>
	    </li>
    @endif
</ul>
