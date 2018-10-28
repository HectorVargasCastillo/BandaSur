@extends('layouts.frontend')

{{-- Page Title --}}
@section('page-title', 'Bienvenida')

{{-- Page Subtitle --}}
@section('page-subtitle', '')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    
@endsection

@section('content')

  
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

  @foreach($slider_info as $key=>$slider)

    <div class="item <?php echo ($key == 0) ? "active" : ""; ?> ">

        <img style="height:50%;width:100%;" src="{{ asset($slider->banda['ruta_img'].$slider->banda['nombre_img']) }}"  height="100" alt="JOjo QUe te pasaa"/>
        <div class="carousel-caption">
              <h3>{{ $slider->nombre }}</h3>
              <h3>{{ $slider->fecha }}</h3>
        </div>
    </div>

  @endforeach

    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


@endsection
