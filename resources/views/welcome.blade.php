@extends('layouts.frontend')

{{-- Page Title --}}
@section('page-title', 'Te Damos la Bienvenida')

{{-- Page Subtitle --}}
@section('page-subtitle', '')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    
@endsection

@section('content')

  
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  @php($registros = count($slider_info)) 

<?php
setlocale(LC_ALL,"es_ES");
//echo strftime("%A %d de %B del %Y");
 
//Salida: viernes 05 de Septiembre del 2016
?>
 

 
  <ol class="carousel-indicators">
    @for ($i = 0; $i < $registros; $i++) 
        @if ($i == 0)
            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
        @else
            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
        @endif
    @endfor
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

  @foreach($slider_info as $key=>$slider)

    <div class="item <?php echo ($key == 0) ? "active" : ""; ?> ">

       <img style="height:50%;width:100%;" src="{{ asset($slider->banda['ruta_img'].$slider->banda['nombre_img']) }}" alt=""/> 
       <!-- <div class="carousel-caption" d-none d-md-block>
              <div class="col-lg-7" align="center" text-align="center">  
                    <h1>{{ $slider->nombre }}</h1>
                    <span class="title-rotador">{{ date("d-m-Y", strtotime($slider->fecha)) }}</span>
                    <br><a class="btn btn-lg btn-primary" href="#" role="button">Leer mas</a>
                    <h1></h1>
                    <h1></h1>
               </div>  
        </div> -->
        <div class="container">
          <div class="carousel-caption">
            <!--<h1>Es es el Evento para el {{ date("d-m-Y", strtotime($slider->fecha)) }}</h1>-->
            <h2>Es es el Evento para el {{strftime("%A %e %B %G",strtotime($slider->fecha))}}</h2>
            <!--<p class="lead">{{ $slider->nombre }}</p>-->
            <h1>{{ $slider->nombre }}</h1>
     <!--       <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
            	<p style="text-align:left">Leer mas....</p>
            </a>  -->
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#create">Leer mas...</button>

          </div>
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

<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Evento : {{ $slider->nombre }}</h4>
            </div>
            <div class="modal-body">
                <h4>A relizarse el {{ date("d-m-Y", strtotime($slider->fecha)) }} a las {{ $slider->hora }} hrs.</h4>
                <h4>En {{ $slider->recinto}} de la ciudad de {{ $slider->ciudad['nombre']}}</h4>
                <h4>Tocara {{ $slider->banda['nombre']}}</h4>
                <h4>La Productora encarga del evento es {{ $slider->productora['nombre']}}</h4>
            </div>

            <div class="modal-footer">
                <!-- <input type="submit" class="btn btn-primary" value="Continuar"> -->
                <h4>Nos vemos !!!</h4>
            </div>

        </div>
    </div>
</div>


 
@endsection







