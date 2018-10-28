<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU PRINCIPAL</li>
    <li class="{{ \App\Utils::checkRoute(['dashboard::index', 'admin::index']) ? 'active': '' }}">
        <a href="{{ url('/eventos') }}">
            <i class="fa fa-dashboard"></i> <span>Eventos</span>
        </a>
        <a href="{{ url('/bandas') }}">
            <i class="fa fa-dashboard"></i> <span>Bandas</span>
        </a>
        <!--<a href="{{ route('dashboard::index') }}">-->
        <a href="{{url('/estilos')}}">
            <i class="fa fa-dashboard"></i> <span>Estilos</span>
        </a>
        <a href="{{url('/productoras')}}">
            <i class="fa fa-dashboard"></i> <span>Productora</span>
        </a>
        <!--<a href="{{ route('dashboard::index') }}">-->
        <a href={{url('/estado_eventos')}}>
            <i class="fa fa-dashboard"></i> <span>Estado Eventos</span>
        </a>
        <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Registro Propuestas</span>
        </a>
         <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Registro Donaciones</span>
        </a>
        <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Visitantes Registrados</span>
        </a>

    </li>
    <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Parametros Generales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/paises')}}">  <i class="fa fa-circle-o"></i>Paises</a></li>
            <li><a href="{{url('/ciudades')}}"><i class="fa fa-circle-o"></i>Ciudades</a></li>
             <li><a href="{{url('/instrumentos')}}"><i class="fa fa-circle-o"></i>Instrumentos</a></li>
          </ul>
    </li>




    @if (Auth::user()->can('viewList', \App\User::class))
        <li class="{{ \App\Utils::checkRoute(['admin::users.index', 'admin::users.create']) ? 'active': '' }}">
            <a href="{{ route('admin::users.index') }}">
                <i class="fa fa-user-secret"></i> <span>Usuarios</span>
            </a>
        </li>
    @endif
</ul>
