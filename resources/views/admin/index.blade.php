{{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', 'Administrador')

{{-- Page Subtitle --}}
@section('page-subtitle', 'Panel de Control')

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin') !!}
@endsection

{{-- Header Extras to be Included --}}
@section('head-extras')
    @parent
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $reports->getTotalUsers() }}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon smaller">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="{{ route('admin::users.index') }}" class="small-box-footer">Lista de Usuarios <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
