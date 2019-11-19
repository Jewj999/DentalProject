@extends('admin.layouts.admin')

@section('title', 'Pacientes')

@section('content')
<div class="row">
    <div class="x_content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pacientes.new') }}">Nuevo Paciente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Listado de Pacientes</a>
            </li>
        </ul>
    </div>
</div>

@yield('content_paciente')
@endsection

@section('styles')
@parent
{{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection