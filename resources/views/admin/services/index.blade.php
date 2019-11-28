@extends('admin.layouts.admin')

@section('title', 'Servicios')

@section('content')
<div class="row">
    <div class="x_content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.servicios.new') }}">Nuevo Servicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.servicios.list') }}">Listado de Servicios</a>
            </li>
        </ul>
    </div>
</div>

@yield('content_services')
@endsection

@section('styles')
@parent
{{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection